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
     *      'user_id' => '1',
     *      'title' => 'title',
     *      'content' => 'content'
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
     *      'id' => '1',
     *      'user_type' => 'admin' / 'user',
     *      'email' => 'email',
     *      'password' => '******',
     *      'name' => 'name',
     *      'address' => 'address',
     *      'phone_number' => '123456',
     * ]
     * @return object
     */
    public function row($params = [])
    {
        $this->db->from($this->table);

        if (isset($params['id'])) { $this->db->where('id', $params['id']); }
        if (isset($params['user_type'])) { $this->db->where('user_type', $params['user_type']); }
        if (isset($params['email'])) { $this->db->where('email', $params['email']); }
        if (isset($params['password'])) { $this->db->where('password', md5($params['password'])); }
        if (isset($params['name'])) { $this->db->where('name', $params['name']); }
        if (isset($params['address'])) { $this->db->where('address', $params['address']); }
        if (isset($params['phone_number'])) { $this->db->where('phone_number', $params['phone_number']); }

        return $this->db->get()->row();
    }

    /**
     * @param array $params
     * [
     *      'name' => 'name',
     *      'slug' => 'slug',
     * ]
     * @return object
     */
    public function rows($params = [])
    {
        $this->db->select('q.*');
        $this->db->select('u.name AS user_name');

        $this->db->from($this->table.' AS q');
        $this->db->join($this->Users_Model->table.' AS u', 'u.id = q.user_id', 'LEFT');

        if (isset($params['name'])) { $this->db->where('q.name', $params['name']); }
        if (isset($params['slug'])) { $this->db->where('q.slug', $params['slug']); }

        isset($params['order_by']) ? $this->db->order_by($params['order_by']) : $this->db->order_by('q.title ASC');

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
