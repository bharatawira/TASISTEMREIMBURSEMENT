<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index(){
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('dashboard');
        $this->load->view('layout/footer');
    }

    public function listlaporan() {
      $url = base_url('/api/main/nota');
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEwIiwidXNlcm5hbWUiOiJiaGFyYXRhd3AzNTIiLCJpYXQiOjE2MjIyNzI4MDcsImV4cCI6MTYyMjI5MDgwN30.qnCCb7UhW3V7H35Z596bVyQDnfqoUKpY87RMMJTUeyE'
        )
      );
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
      // Send the request
      $result = curl_exec($curl);
      // Free up the resources $curl is using
      curl_close($curl);

      $getUser = json_decode($result,true);
      $user['datauser'] = $getUser['data'];
      
      $this->load->view('layout/header');
      $this->load->view('layout/sidebar');
      $this->load->view('layout/navbar');
      $this->load->view('listlaporan', $user);
      $this->load->view('layout/footer');


    }

    public function listkaryawan(){
        $url = base_url('/api/main/users');
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEwIiwidXNlcm5hbWUiOiJiaGFyYXRhd3AzNTIiLCJpYXQiOjE2MjIyNzI4MDcsImV4cCI6MTYyMjI5MDgwN30.qnCCb7UhW3V7H35Z596bVyQDnfqoUKpY87RMMJTUeyE'
          )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // Send the request
        $result = curl_exec($curl);
        // Free up the resources $curl is using
        curl_close($curl);

        $getUser = json_decode($result,true);
        $user['datauser'] = $getUser['data'];
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('user', $user);
        $this->load->view('layout/footer');
    }


    public function delete_user($id){
        $url = base_url('/api/main/users/id/'.$id);
               $curl = curl_init($url);
               curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
           
               curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEwIiwidXNlcm5hbWUiOiJiaGFyYXRhd3AzNTIiLCJpYXQiOjE2MjIyNzI4MDcsImV4cCI6MTYyMjI5MDgwN30.qnCCb7UhW3V7H35Z596bVyQDnfqoUKpY87RMMJTUeyE'
                 )
               );
               curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
               // Send the request
               $result = curl_exec($curl);
               // Free up the resources $curl is using
               curl_close($curl);
               $deleteUser = json_decode($result,true);
               if($deleteUser['status'] == 200){
                 echo ("<script LANGUAGE='JavaScript'>
                 window.alert('User deleted!');
                 window.location.href='".base_url('dashboard/listkaryawan')."';
                 </script>");
               }else{
                 echo ("<script LANGUAGE='JavaScript'>
                 window.alert('Failed to delete');
                 window.location.href='".base_url('dashboard/listkaryawan')."';
                 </script>");
               }
       
       }

       public function delete_nota($id){
        $url = base_url('/api/main/nota/id/'.$id);
               $curl = curl_init($url);
               curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
           
               curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEwIiwidXNlcm5hbWUiOiJiaGFyYXRhd3AzNTIiLCJpYXQiOjE2MjIyNzI4MDcsImV4cCI6MTYyMjI5MDgwN30.qnCCb7UhW3V7H35Z596bVyQDnfqoUKpY87RMMJTUeyE'
                 )
               );
               curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
               // Send the request
               $result = curl_exec($curl);
               // Free up the resources $curl is using
               curl_close($curl);
               $deleteUser = json_decode($result,true);
               if($deleteUser['status'] == 200){
                 echo ("<script LANGUAGE='JavaScript'>
                 window.alert('Nota deleted!');
                 window.location.href='".base_url('dashboard/listlaporan')."';
                 </script>");
               }else{
                 echo ("<script LANGUAGE='JavaScript'>
                 window.alert('Failed to delete');
                 window.location.href='".base_url('dashboard/listlaporan')."';
                 </script>");
               }
       
       }
}