<?php
class Todo_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
		//	$this->load->model('users_model');
    }
    public function get_todos($user_id,$role=""){
		$where = "";
		$join = "";
        if ($role=="admin"){

			$join = "LEFT JOIN users on users.id = todo.user_id";
		}else{

			$where = "WHERE todo.user_id={$user_id}";
        }
		$qry = "SELECT *,todo.id AS id From todo {$join} {$where} ORDER BY time desc";
        $query = $this->db->query($qry);

		// $query = $this->db->get('todo');
        return $query->result_array();
    }
    public function get_todo($id){
        $query = $this->db->get_where('todo', array('id' => $id));
        return $query->row_array();
    }
    public function create_todo($data){
        $this->db->insert('todo', $data);
    }
    public function update_todo( $data ){
        $this->db->set('event', $data['event']);
        $this->db->set('status', $data['status']);
        $this->db->where('id', $data['todo_id'] );
        $this->db->update('todo');
    }  
    public function delete_todo($id){
        return $this->db->delete('todo', array('id' => $id));
    }
    public function search_todos($keyword,  $user_id){
        $this->db->select('*');
        $this->db->group_start();
        $this->db->like('event', $keyword);
        $this->db->or_like('status', $keyword);
        $this->db->group_end();
        $query = $this->db->get('todo');
        return $query->result_array();
    }

        
}
?>
