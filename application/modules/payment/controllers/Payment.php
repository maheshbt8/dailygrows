<?php

class Payment extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->template = 'template/admin/main';
        $this->load->model('wallet_transaction_model');
        $this->load->model('user_model');
    }
    
    public function wallet_transactions($type = 'list'){
        if($type == 'list'){
            $this->data['title'] = 'Transactions List';
            $this->data['content'] = 'payment/list';
            if($_GET['user_id'] != ''){
                $this->data['transactions'] = $this->wallet_transaction_model->where(['user_id'=>$_GET['user_id']])->order_by('created_at','desc')->get_all();
            }else{ 
                $this->data['transactions'] = $this->wallet_transaction_model->order_by('created_at','desc')->get_all();
            }
            if(! empty($this->data['transactions'])){
                for ($i = 0; $i < count($this->data['transactions']) ; $i++){
                    $this->data['transactions'][$i]['unique_id'] = $this->user_model->get($this->data['transactions'][$i]['user_id'])['unique_id'];
                }
            }
            $this->_render_page($this->template, $this->data);
        }elseif ($type == 'change_status'){
            echo $this->wallet_transaction_model->update([
                'id' => $this->input->post('id'),
                'txn_id' => $this->input->post('txn_id'),
                'status' => $this->input->post('status'),
            ], 'id');
        }
    }
    public function withdraw_list($type = 'list')
    {
        if($type == 'list'){
            $this->data['title'] = 'Withdraw List';
            $this->data['content'] = 'payment/withdraw_list';
            if($_GET['user_id'] != ''){
                $this->data['transactions'] = $this->db->get_where('withdraw_requests',['approved'=>0,'user_id'=>$_GET['user_id']])->order_by('created_at','desc')->result_array();
            }else{
                $this->data['transactions'] = $this->db->get_where('withdraw_requests',['approved'=>0])->order_by('created_at','desc')->result_array();
            }
            if(! empty($this->data['transactions'])){
                for ($i = 0; $i < count($this->data['transactions']) ; $i++){
                    $this->data['transactions'][$i]['unique_id'] = $this->user_model->get($this->data['transactions'][$i]['user_id'])['unique_id'];
                }
            }
            $this->_render_page($this->template, $this->data);
        }
    }
}

