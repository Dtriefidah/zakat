<?php

class Answers_Model extends CI_Model
{
    public $ci;
    public $table = 'answers';

    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();
        $this->load->model(['Questions_Model', 'Users_Model']);
    }

    public function validate($scenario = '')
    {
        switch ($scenario) {
            case 'create' :
                $this->ci->form_validation->set_rules('user_id', lang('user'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('question_id', lang('question'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('content', lang('content'), ['trim', 'required']);

                break;
            case 'update' :
                $this->ci->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('question_id', lang('question'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('user_id', lang('user'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('content', lang('content'), ['trim', 'required']);

                break;
            default :
                $this->ci->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('question_id', lang('question'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('user_id', lang('user'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('content', lang('content'), ['trim', 'required']);
                $this->ci->form_validation->set_rules('created_at', lang('created_at'), ['trim', 'required']);

                break;
        }
        return $this->ci->form_validation->run();
    }

    /**
     * @param array $params
     * [
     *      'question_id' => '1',
     *      'user_id' => '1',
     *      'content' => 'content'
     * ]
     * @return integer $id
     */
    public function create($params = [])
    {
        $data = [];
        if (isset($params['question_id'])) { $data['question_id'] = $params['question_id']; }
        if (isset($params['user_id'])) { $data['user_id'] = $params['user_id']; }
        if (isset($params['content'])) { $data['content'] = $params['content']; }
        $data['created_at'] = date('Y-m-d H:i:s');

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id = 0)
    {
        $this->db->delete($this->table, ['id' => $id]);
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
        $this->db->select('a.*');
        $this->db->select('q.title AS question_title');
        $this->db->select('u.name AS user_name');

        $this->db->from($this->table.' AS a');
        $this->db->join($this->Questions_Model->table.' AS q', 'q.id = a.question_id', 'LEFT');
        $this->db->join($this->Users_Model->table.' AS u', 'u.id = a.user_id', 'LEFT');

        if (isset($params['name'])) { $this->db->where('q.name', $params['name']); }
        if (isset($params['slug'])) { $this->db->where('q.slug', $params['slug']); }

        isset($params['order_by']) ? $this->db->order_by($params['order_by']) : $this->db->order_by('a.created_at DESC');

        return $this->db->get()->result();
    }

    /**
     * @param array $params
     * [
     *      'id' => '1',
     *      'question_id' => 'question_id',
     *      'user_id' => '1',
     *      'content' => 'content',
     * ]
     */
    public function update($params = [])
    {
        $data = [];
        if (isset($params['question_id'])) { $data['question_id'] = $params['question_id']; }
        if (isset($params['user_id'])) { $data['user_id'] = $params['user_id']; }
        if (isset($params['content'])) { $data['content'] = $params['content']; }

        $this->db->where('id', $params['id']);
        $this->db->update($this->table, $data);
    }
}
