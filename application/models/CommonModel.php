<?php

class CommonModel extends CI_Model
{


    //insert into table

    public function insert($table,$data)
    {

        $this->db->insert($table,$data);
        
        return ($this->db->insert_id());

    }


    //fetch all data 
    public function fetch_all($table)
    {
        $this->db->select('*');

        $this->db->from($table);

        $query = $this->db->get();

        return $query->result();
    }


    //fetch single row 
    public function fetch_single($table,$col,$id)
    {

    $this->db->select('*');

    $this->db->from($table);

    $this->db->where($col,$id);

    $query = $this->db->get();

    return $query->row_array();

    }


    public function update($table,$cond,$data)
    {

        return $this->db->update($table,$data,$cond);

    }



    //Custom fns



    //Products


    public function count_products()
    {

    $this->db->select('*');

    $this->db->from('products');

    $this->db->where('is_deleted',0);

    $query = $this->db->get();

    return $query->num_rows();

    }
    




    public function fetch_all_products()
    {

    $this->db->select('*');

    $this->db->from('products');

    $this->db->join('category','category.category_id=products.categoryId','left');

    $this->db->where('is_deleted',0);

    $this->db->order_by('products.name','asc');

    $query = $this->db->get();

    return $query->result();

    }


    //





    //Orders


    public function count_orders()
    {

    $this->db->select('*');

    $this->db->from('orders');

    $query = $this->db->get();

    return $query->num_rows();

    }



    public function fetch_all_orders()
    {

    $this->db->select('*');

    $this->db->from('orders');

    $this->db->join('products','products.product_id=orders.productId','left');

    $this->db->order_by('order_id','desc');

    $query = $this->db->get();

    return $query->result();

    }




    
    public function fetch_single_order($id)
    {

    $this->db->select('*');

    $this->db->from('orders');

    $this->db->join('products','products.product_id=orders.productId','left');

    $this->db->where('order_id',$id);

    $query = $this->db->get();

    return $query->row_array();

    }





    








}