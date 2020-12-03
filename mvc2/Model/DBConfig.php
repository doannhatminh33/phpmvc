<?php
    class Database{
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass = '549203492aA';
        private $dbname ='mywebdatabase';

        private $conn = NULL;
        private $result = NULL;
        
        public function connect()
        {
            $this->conn = new mysqli($this->hostname,$this->username,$this->pass,$this->dbname);
            if(!$this->conn){
                echo "Kết nối thất bại";
                exit();
            }
            else{
                mysqli_set_charset($this->conn,'utf8');
            }
            return $this->conn;
        }
        public function execute($sql)
        {
            $this->result = $this->conn->query($sql);
            return $this->result;
        }
        public function getData()
        {
            if($this->result){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = 0;
            }
            return $data;
        }
        public function getAllData($table)
        {
            $sql = "SELECT * FROM $table";
            $this->execute($sql);
            if($this->num_rows()==0){
                $data =0;
            }
            else{
                while($datas = $this->getData()){
                    $data[]=$datas;
                }
                return $data;
            }
        }

        public function getDataID($table,$id)
        {
            $sql= "SELECT * FROM $table WHERE id = '$id'";
            $this->execute($sql);
            if($this->num_rows()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = 0;
            }
            return $data;
        }
        //Phương thức đếm số bản ghi
        public function num_rows(){
            if($this->result){
                $num = mysqli_num_rows($this->result);
            }
            else{
                $num=0;
            }
            return $num;
        } 
        //Phương thức thêm dữ liệu
        public function InsertData($title,$description,$image,$status)
        {   
            $date=date("Y-m-d h:i:sa");
            $sql = "INSERT INTO imagetable (id, title, description, image, status, create_at, update_at) VALUES(null,'$title','$description','$image','$status','$date',null)";
            return $this->execute($sql);
        }
        public function UpdateData($id,$title,$description,$image,$status)
        {
            $date=date('Y-m-d H:i:sa');
            $sql = "UPDATE imagetable SET title = '$title', description = '$description',image = '$image',status ='$status',update_at='$date' WHERE id = '$id'";
            return $this->execute($sql);
        }
        public function Delete($id)
        {
            $sql = "DELETE FROM imagetable WHERE id ='$id'";
            return $this->execute($sql);
        }
    }
?>