<?php

class Users_Model extends CI_Model
{
    public $ci;
    public $table = 'users';
    public $user_type_admin = 'admin';
    public $user_type_user = 'user';

    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();
    }

    public function validate($scenario = '')
    {
        switch ($scenario) {
            case 'create' :
                $this->ci->form_validation->set_rules('user_type', lang('user_type'), ['trim', 'required']);
                $this->ci->form_validation->set_rules('email', lang('email'), ['trim', 'required', 'valid_email', 'max_length[100]', 'is_unique['.$this->table.'.email]']);
                $this->ci->form_validation->set_rules('password', lang('password'), ['trim', 'required', 'max_length[32]']);
                $this->ci->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);
                $this->ci->form_validation->set_rules('address', lang('address'), ['trim', 'required']);

                $this->ci->form_validation->set_rules('phone_number', lang('phone_number'), ['trim', 'required', 'max_length[16]']);

                break;
            case 'sign_in' :
                $this->ci->form_validation->set_rules('email', lang('email'), ['trim', 'required', 'valid_email', 'max_length[100]']);
                $this->ci->form_validation->set_rules('password', lang('password'), ['trim', 'required', 'max_length[32]', ['sign_in_callable', [$this, 'sign_in_check']]]);

                break;
            case 'sign_up' :
                $this->ci->form_validation->set_rules('user_type', lang('user_type'), ['trim', 'required']);
                $this->ci->form_validation->set_rules('email', lang('email'), ['trim', 'required', 'valid_email', 'max_length[100]', 'is_unique['.$this->table.'.email]']);
                $this->ci->form_validation->set_rules('password', lang('password'), ['trim', 'required', 'max_length[32]']);
                $this->ci->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);
                $this->ci->form_validation->set_rules('phone_number', lang('phone_number'), ['trim', 'required', 'max_length[16]']);

                break;
            case 'update' :
                $this->ci->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('user_type', lang('user_type'), ['trim', 'required']);
                $this->ci->form_validation->set_rules('email', lang('email'), ['trim', 'required', 'valid_email', 'max_length[100]', ['email_callable', [$this, 'email_check']]]);
                $this->ci->form_validation->set_rules('password', lang('password'), ['trim', 'max_length[32]']);
                $this->ci->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);

                $this->ci->form_validation->set_rules('address', lang('address'), ['trim', 'required']);
                $this->ci->form_validation->set_rules('phone_number', lang('phone_number'), ['trim', 'required', 'max_length[16]']);

                break;
            default :
                $this->ci->form_validation->set_rules('id', lang('id'), ['trim', 'required', 'integer', 'max_length[11]']);
                $this->ci->form_validation->set_rules('user_type', lang('user_type'), ['trim', 'required']);
                $this->ci->form_validation->set_rules('email', lang('email'), ['trim', 'required', 'valid_email', 'max_length[100]']);
                $this->ci->form_validation->set_rules('password', lang('password'), ['trim', 'required', 'max_length[32]']);
                $this->ci->form_validation->set_rules('name', lang('name'), ['trim', 'required', 'max_length[100]']);

                $this->ci->form_validation->set_rules('address', lang('address'), ['trim', 'required']);
                $this->ci->form_validation->set_rules('phone_number', lang('phone_number'), ['trim', 'required', 'max_length[16]']);

                break;
        }
        return $this->ci->form_validation->run();
    }

    /**
     * @param array $params
     * [
     *      'user_type' => 'admin' / 'user',
     *      'email' => 'email',
     *      'password' => '******',
     *      'name' => 'name',
     *      'address' => 'address',
     *      'phone_number' => '123456',
     * ]
     * @return integer $id
     */
    public function create($params = [])
    {
        $data = [];
        if (isset($params['user_type'])) { $data['user_type'] = $params['user_type']; }
        if (isset($params['email'])) { $data['email'] = $params['email']; }
        if (isset($params['password'])) { $data['password'] = md5($params['password']); }
        if (isset($params['name'])) { $data['name'] = $params['name']; }
        if (isset($params['address'])) { $data['address'] = $params['address']; }
        if (isset($params['phone_number'])) { $data['phone_number'] = $params['phone_number']; }

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id = 0)
    {
        $this->db->delete($this->table, ['id' => $id]);
    }

    public function email_check()
    {
        $count = $this->db->from($this->table)->where('id !=', $this->input->post('id'))->where('email', $this->input->post('email'))->count_all_results();
        if ($count > 0) {
            $this->ci->form_validation->set_message('email_callable', '{field} '.lang('field_must_contain_a_unique_value').'.');
            return false;
        }
        return true;
    }

    public function get_user_type_options()
    {
        return [
            '' => '- '.lang('choose_user_type').' -',
            $this->user_type_admin => lang('admin'),
            $this->user_type_user => lang('user'),
        ];
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
     *      'user_type' => ['admin', 'user'],
     *      'email' => 'email',
     *      'password' => '******',
     *      'name' => 'name',
     *      'address' => 'address',
     *      'phone_number' => '123456',
     *      'order_by' => 'email ASC',
     * ]
     * @return object
     */
    public function rows($params = [])
    {
        $this->db->from($this->table);

        if (isset($params['user_type'])) { $this->db->where_in('user_type', $params['user_type']); }
        if (isset($params['email'])) { $this->db->where('email', $params['email']); }
        if (isset($params['password'])) { $this->db->where('password', md5($params['password'])); }
        if (isset($params['name'])) { $this->db->where('name', $params['name']); }
        if (isset($params['address'])) { $this->db->where('address', $params['address']); }
        if (isset($params['phone_number'])) { $this->db->where('phone_number', $params['phone_number']); }

        isset($params['order_by']) ? $this->db->order_by($params['order_by']) : $this->db->order_by('email ASC');

        return $this->db->get()->result();
    }

    public function sign_in_check()
    {
        $count = $this->db->from($this->table)->where(['user_type' => $this->user_type_admin, 'email' => $this->input->post('email'), 'password' => md5($this->input->post('password')) ])->count_all_results();
        if ($count == 0) {
            $this->ci->form_validation->set_message('sign_in_callable', lang('these_credentials_do_not_match_our_records').'.');
            return false;
        }
        return true;
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
     */
    public function update($params = [])
    {
        $data = [];
        if (isset($params['user_type'])) { $data['user_type'] = $params['user_type']; }
        if (isset($params['email'])) { $data['email'] = $params['email']; }
        if (isset($params['password'])) { $data['password'] = md5($params['password']); }
        if (isset($params['name'])) { $data['name'] = $params['name']; }
        if (isset($params['address'])) { $data['address'] = $params['address']; }
        if (isset($params['phone_number'])) { $data['phone_number'] = $params['phone_number']; }

        $this->db->where('id', $params['id']);
        $this->db->update($this->table, $data);
    }

    public function users_options()
    {
        $categories = $this->db->from($this->table)->order_by('name ASC')->get()->result_array();
        $options = ['' => '- '.lang('choose_user').' -'] + array_column($categories, 'name', 'id');
        return $options;
    }
}
