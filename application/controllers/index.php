<?php
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller {
    public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('mMenu');
    $this->load->model('mNews');
}

    public function index(){
        
        $this->session->set_flashdata("halaman", "index"); //mensetting menuKepilih atau menu aktif

        $get_data_menu = $this->mMenu->getMenuHead();
        $get_news_week = $this->mNews->getNewsWeek();
        $data['menu'] = $get_data_menu; 
        $data['get_news_week'] = $get_news_week;
        $this->template->load('template_home','index/index',$data);
        
    }

    public function menu($id_menu){

        $get_data_menu = $this->mMenu->getMenuHead();
        $get_news_week = $this->mNews->getNewsWeekMenu($id_menu);
        $get_detail_menu = $this->mMenu->getMenuItem($id_menu);
        $get_news = $this->mNews->getNews($id_menu);

        $controller_menu = $get_detail_menu[0]->controller;
        $name_menu = $get_detail_menu[0]->name;
        $this->session->set_flashdata("halaman", $controller_menu); //mensetting menuKepilih atau menu aktif

        $data['menu'] = $get_data_menu; 
        $data['get_news_week'] = $get_news_week;
        $data['get_news'] = $get_news;
        $data['name_menu'] = $name_menu;
        $this->template->load('template_home','index/index_menu',$data);
        
    }

    public function newsDetail($id_news){

        $get_detail_news = $this->mNews->getNewsItem($id_news);
        $id_menu = $get_detail_news[0]->id_menu;
        $get_news_week = $this->mNews->getNewsWeekMenu($id_menu);
        $get_detail_menu = $this->mMenu->getMenuItem($id_menu);
        $get_data_menu = $this->mMenu->getMenuHead();
        
        $controller_menu = $get_detail_menu[0]->controller;
        $name_menu = $get_detail_menu[0]->name;
        $this->session->set_flashdata("halaman", $controller_menu); //mensetting menuKepilih atau menu aktif

        $data['menu'] = $get_data_menu; 
        $data['get_news_week'] = $get_news_week;
        $data['name_menu'] = $name_menu;
        $data['news_detail'] = $get_detail_news;
        $this->template->load('template_home','index/index_detail',$data);
        
    }
}

?>