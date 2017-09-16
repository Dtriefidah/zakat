<?php

class Question extends Frontend_Controller
{
    protected $limit = 5;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Answers_Model', 'Questions_Model']);
    }

    public function index()
    {
        $vars['last_url'] = current_url_with_params();
        $vars['questions'] = $this->Questions_Model->rows(['limit' => $this->limit, 'offset' => $this->input->get('offset')]);

        $config = $this->pagination->bootstrap_material;
        $config['base_url'] = current_url();
        $config['per_page'] = $this->limit;
        $config['total_rows'] = $this->Questions_Model->count();
        $this->pagination->initialize($config);
        $vars['questions_pagination'] = $this->pagination->create_links();

        $this->render('frontend/question/index', $vars);
    }

    public function create()
    {
        ($this->is_login()) ?: redirect('auth/sign_in?last_url='.base64_encode(current_url_with_params()));

        $vars['last_url'] = $last_url = base64_decode($this->input->get('last_url'));
        $vars['next_url'] = $next_url = ($last_url ? $last_url : 'question');

        if ($this->input->post()) {
            $_POST['user_id'] = $this->user->id;
            if ($this->Questions_Model->validate('create')) {
                $this->Questions_Model->create($this->input->post());
                $this->session->set_flashdata('message', lang('question_has_been_created'));
                redirect($next_url);
            }
        }

        $this->render('frontend/question/create', $vars);
    }

    public function detail($slug = '')
    {
        ($question = $this->Questions_Model->row(['slug' => $slug])) ?: show_404();

        $vars['answers'] = $this->Answers_Model->rows(['question_id' => $question->id, 'order_by' => 'created_at ASC']);
        $vars['last_url'] = base64_decode($this->input->get('last_url'));
        $vars['question'] = $question;

        if ($this->input->post('reply')) {
            $_POST['question_id'] = $question->id;
            $_POST['user_id'] = ($this->user ? $this->user->id : '');
            if ($this->Answers_Model->validate('create')) {
                $this->Answers_Model->create($this->input->post());
                $this->session->set_flashdata('message', lang('question_has_been_replied'));
                redirect(current_url_with_params());
            }
        }

        $this->render('frontend/question/detail', $vars);
    }
}
