<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('Crud');
    }
	
	public function test_post()
	{
       
        $theCredential = $this->user_data;
        $this->response($theCredential, 200); // OK (200) being the HTTP response code
        
	}

    public function users_get()
    {

        $id = $this->get('id');


        if ($id === NULL)
        {
            $getUser = $this->Crud->readData('id,name,username,role','user')->result();
            if ($getUser)
            {
                // Set the response and exit
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get user',
                    'data'=> $getUser
                ];
                $this->response($output, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'No users were found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        if($id){
            $where = [
                'id'=> $id
            ];
            $getUserById = $this->Crud->readData('username,name,role','user',$where)->result();

            if($getUserById){
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success get user',
                    'data'=> $getUserById
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed get User or id Not found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }

    public function users_put(){

        $id = (int) $this->get('id');
        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','user',$where)->num_rows();

            if($cekId > 0){
                $data = [
                    "name"      => $this->put('name'),
                    "username"  => $this->put('username'),
                    "password"  => sha1($this->put('password')),
                    "role"      => $this->put('role')
                ];

                $updateData = $this->Crud->updateData('user',$data,$where);
                if($updateData){
                    $output = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success edit user',
                    ];
                    $this->response($output, REST_Controller::HTTP_OK);
                }else{
                    $output = [
                        'status' => 400,
                        'error' => false,
                        'message' => 'Failed edit user',
                    ];
                    $this->response($output, REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete user or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }

    }

    public function users_delete()
    {

        $id = (int) $this->get('id');

        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','user',$where)->num_rows();

            if($cekId > 0){
                
                $this->Crud->deleteData('user',$where);
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success delete user',
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed delete user or id not found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }

    public function nota_post() {
        $nama = $this->post('nama');
        $jenis_ikan = $this->post('jenis_ikan');
        $harga = $this->post('harga');
        $status = $this->post('status');
        $date = date('Y-m-d');

        $data = [
            "nama"=>$nama,
            "jenis_ikan"=>$jenis_ikan,
            "harga"=>$harga,
            "status"=>$status,
            "date"=>$date
        ];

        $createnota = $this->Crud->createData('nota',$data);
        
        if($createnota) {
            $output = [
                'status' => 200,
                'error' => false,
                'message' => 'Success create nota',
                'data' => $data
            ];
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output = [
                'status' =>400,
                'error' => false,
                'message' => 'Failed create nota',
                'data'=> []
            ];
            $this->set_response($output, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function nota_get()
    {

        $id = $this->get('id');


        if ($id === NULL)
        {
            $getUser = $this->Crud->readData('id,nama,jenis_ikan,harga,status,date','nota')->result();
            if ($getUser)
            {
                // Set the response and exit
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success Get Nota',
                    'data'=> $getUser
                ];
                $this->response($output, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'No nota were found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        if($id){
            $where = [
                'id'=> $id
            ];
            $getUserById = $this->Crud->readData('id,nama,jenis_ikan,harga,status,date','nota',$where)->result();

            if($getUserById){
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success Get Nota',
                    'data'=> $getUserById
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed Get Nota or id Not Found',
                    'data'=> []
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }

    public function nota_put()
    {
        $id = (int) $this->get('id');
        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','nota',$where)->num_rows();

            if($cekId > 0){
                $data = [
                    "nama"          => $this->put('nama'),
                    "jenis_ikan"    => $this->put('jenis_ikan'),
                    "harga"         => $this->put('harga'),
                    "status"        => $this->put('status'),
                    "date"          => $this->put('date')
                ];

                $updateData = $this->Crud->updateData('nota',$data,$where);
                if($updateData){
                    $output = [
                        'status' => 200,
                        'error' => false,
                        'message' => 'Success Edit Nota',
                    ];
                    $this->response($output, REST_Controller::HTTP_OK);
                }else{
                    $output = [
                        'status' => 400,
                        'error' => false,
                        'message' => 'Failed Edit Nota',
                    ];
                    $this->response($output, REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed Delete Nota or Id Not Found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }

    public function nota_delete()
    {

        $id = (int) $this->get('id');

        if($id){
            $where = [
                'id'=> $id
            ];
            $cekId = $this->Crud->readData('id','nota',$where)->num_rows();

            if($cekId > 0){
                
                $this->Crud->deleteData('nota',$where);
                $output = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'Success Delete Nota',
                ];
                $this->response($output, REST_Controller::HTTP_OK);
            }else{
                $output = [
                    'status' => 404,
                    'error' => false,
                    'message' => 'Failed Delete User or Id Not Found',
                ];
                $this->response($output, REST_Controller::HTTP_NOT_FOUND); 
            }
        }
    }

}
