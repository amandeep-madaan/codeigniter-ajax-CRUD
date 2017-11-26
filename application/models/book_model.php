<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Book_model extends CI_Model
{
    var $table = 'books';

    public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }
    
    
    //get all books from database
    public function get_all_books()
    {
        $this->db->from('books');
        $query=$this->db->get();
        return $query->result();
    }
    //To fetch single book record, we have to retrieve the book by id
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('book_id', $id);
        $query = $this->db->get();

        return $query->row();
    }
    //To insert a book a into the database
    public function book_add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    //To Update a book record in the database
    public function book_update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    //To Delete the books from the database
    public function delete_by_id($id)
    {
        $this->db->where('book_id', $id);
        $this->db->delete($this->table);
    }
}
?>