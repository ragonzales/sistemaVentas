<?php  

/**
* Clase Login
*/
class LoginModel extends CI_Model
{
	
	public function ingresar($usuario,$password)
	{
		$sql = "Select idusuario,password,nombre,apellidos ";
		$sql .= " From usuario";
		$sql .= " Where idusuario = ?";
		$sql .= " And password = ?";
		$sql .= " And activo = ?";
		$query = $this->db->query($sql, array($usuario,$password, 1));

		if ($query->num_rows() == 1)
		{
		   	foreach ($query->result() as $row)
			{
			   	$usuarioSession= array 	(
									'idusuario' => $row -> idusuario, 
									'nombre' => $row -> nombre . " " . $row -> apellidos, 
									);
			   	$this->session->set_userdata($usuarioSession);
			}
			return 1;
		}
		else{
			return 0;
		}	

		if($resultado->num_rows ==1){
			
			return 1;
		}else{
			return 0;
		}


		return $resultado->result();
	}
}
?>
