<?php

class Questions_Model extends CI_Model
{
    public $ci;
    public $table = 'questions';

    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();
        $this->load->model('Users_Model');
    }

    public function validate($scenario = '')
    {
        switch ($scenario) {
            case 'create' :
                $this->ci->form_validation->set_rules('user_id', lang('user'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('title', lang('title'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('content', lang('content'), ['trim', 'required']);

                break;
            case 'update' :
                $this->ci->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('user_id', lang('user'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('title', lang('title'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('content', lang('content'), ['trim', 'required']);

                break;
            default :
                $this->ci->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('user_id', lang('user'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('title', lang('title'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('slug', lang('slug'), ['trim', 'required', 'max_length[255]']);
                $this->ci->form_validation->set_rules('content', lang('content'), ['trim', 'required']);
                $this->ci->form_validation->set_rules('created_at', lang('created_at'), ['trim', 'required']);

                break;
        }
        return $this->ci->form_validation->run();
    }

    /**
     * @param array $params
     * [
     *      'id' => 'id',
     *      'user_id' => 'user_id',
     *      'title' => 'title',
     *      'slug' => 'slug',
     *      'content' => 'content',
     *      'created_at' => 'created_at',
     * ]
     * @return object
     */
    public function count($params = [])
    {
        $this->db->from($this->table);

        if (isset($params['id'])) { $this->db->where('id', $params['id']); }
        if (isset($params['user_id'])) { $this->db->where('user_id', $params['user_id']); }
        if (isset($params['title'])) { $this->db->where('title', $params['title']); }
        if (isset($params['slug'])) { $this->db->where('slug', $params['slug']); }
        if (isset($params['content'])) { $this->db->where('content', $params['content']); }
        if (isset($params['created_at'])) { $this->db->where('created_at', $params['created_at']); }

        return $this->db->count_all_results();
    }

    /**
     * @param array $params
     * [
     *      'user_id' => '1',
     *      'title' => 'title',
     *      'content' => 'content',
     * ]
     * @return integer $id
     */
    public function create($params = [])
    {
        $data = [];
        if (isset($params['user_id'])) { $data['user_id'] = $params['user_id']; }
        if (isset($params['title'])) { $data['title'] = $params['title']; }
        if (isset($params['content'])) { $data['content'] = $params['content']; }
        $data['created_at'] = date('Y-m-d H:i:s');

        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();

        $data['slug'] = url_title($params['title'].' '.$id, '-', true);
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

        return $id;
    }

    public function delete($id = 0)
    {
        $this->db->delete($this->table, ['id' => $id]);
    }

    public function questions_options()
    {
        $questions = $this->db->from($this->table)->order_by('title ASC')->get()->result_array();
        $options = ['' => '- '.lang('choose_question').' -'] + array_column($questions, 'title', 'id');
        return $options;
    }

    /**
     * @param array $params
     * [
     *      'id' => 'id',
     *      'user_id' => 'user_id',
     *      'title' => 'title',
     *      'slug' => 'slug',
     *      'content' => 'content',
     *      'created_at' => 'created_at',
     * ]
     * @return object
     */
    public function row($params = [])
    {
        $this->db->select('q.*');
        $this->db->select('u.name AS user_name');

        $this->db->from($this->table.' AS q');
        $this->db->join($this->Users_Model->table.' AS u', 'u.id = q.user_id', 'LEFT');

        if (isset($params['id'])) { $this->db->where('q.id', $params['id']); }
        if (isset($params['user_id'])) { $this->db->where('q.user_id', $params['user_id']); }
        if (isset($params['title'])) { $this->db->where('q.title', $params['title']); }
        if (isset($params['slug'])) { $this->db->where('q.slug', $params['slug']); }
        if (isset($params['content'])) { $this->db->where('q.content', $params['content']); }
        if (isset($params['created_at'])) { $this->db->where('q.created_at', $params['created_at']); }

        return $this->db->get()->row();
    }

    /**
     * @param array $params
     * [
     *      'id' => 'id',
     *      'user_id' => 'user_id',
     *      'title' => 'title',
     *      'slug' => 'slug',
     *      'content' => 'content',
     *      'created_at' => 'created_at',
     * ]
     * @return object
     */
    public function rows($params = [])
    {
        $this->db->select('q.*');
        $this->db->select('u.name AS user_name');

        $this->db->from($this->table.' AS q');
        $this->db->join($this->Users_Model->table.' AS u', 'u.id = q.user_id', 'LEFT');

        if (isset($params['id'])) { $this->db->where('q.id', $params['id']); }
        if (isset($params['user_id'])) { $this->db->where('q.user_id', $params['user_id']); }
        if (isset($params['title'])) { $this->db->where('q.title', $params['title']); }
        if (isset($params['slug'])) { $this->db->where('q.slug', $params['slug']); }
        if (isset($params['content'])) { $this->db->where('q.content', $params['content']); }
        if (isset($params['created_at'])) { $this->db->where('q.created_at', $params['created_at']); }

        isset($params['order_by']) ? $this->db->order_by($params['order_by']) : $this->db->order_by('q.created_at DESC');
        if (isset($params['limit'])) { $this->db->limit($params['limit'], $params['offset']); }

        return $this->db->get()->result();
    }

    /**
     * @param array $params
     * [
     *      'id' => '1',
     *      'user_id' => '1',
     *      'title' => 'title',
     *      'content' => 'content',
     * ]
     */
    public function update($params = [])
    {
        $data = [];
        if (isset($params['user_id'])) { $data['user_id'] = $params['user_id']; }
        if (isset($params['title'])) {
            $data['title'] = $params['title'];
            $data['slug'] = url_title($params['title'].' '.$params['id'], '-', true);
        }
        if (isset($params['content'])) { $data['content'] = $params['content']; }

        $this->db->where('id', $params['id']);
        $this->db->update($this->table, $data);
    }
}
