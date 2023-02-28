<?php
session_start();
date_default_timezone_set("Asia/Taipei");

$dns="mysql:host=localhost;charset=utf8;dbname=web26;";
$pdo=new PDO($dns,'root','');



class DB {
    protected $dns="mysql:host=localhost;charset=utf8;dbname=web26;";
    protected $pdo;
    protected $table;
    public function __construct($table)
    {
        $this->pdo=new PDO($this->dns,'root','');
        $this->table=$table;
    }
    public function all(...$arg){
        $sql="SELECT * FROM `$this->table` ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $sql.=" WHERE ".join(" AND ",$this->arrToSql($arg[0]));
            }else{
                $sql.=$arg[0];
            }
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id){
        $sql="SELECT * FROM `$this->table` ";
        if(is_array($id)){
            $sql.=" WHERE ".join(" AND ",$this->arrToSql($id));
        }else{
            $sql.=" WHERE `id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function save($data){
        if(isset($data['id'])){
            $id=$data['id'];
            unset($data['id']);
            $sql="UPDATE `$this->table` SET ".join(" , ",$this->arrToSql($data))." WHERE `id`='$id'";
        }else {
            $keys=array_keys($data);
            $sql="INSERT INTO `$this->table` (`".join("` , `",$keys)."`) VALUES ('".join("' , '",$data)."')";
        }
        return $this->pdo->exec($sql);
    }
    public function del($id){
        $sql="DELETE FROM `$this->table` ";
        if(is_array($id)){
            $sql.=" WHERE ".join(" AND ",$this->arrToSql($id));
        }else{
            $sql.=" WHERE `id`='$id'";
        }
        return $this->pdo->exec($sql);
    }
    public function count($arg){
        return $this->mathSql('COUNT','*',$arg);
    }
    public function sum($col,$arg){
        return $this->mathSql('SUM',$col,$arg);
    }
    public function min($col,$arg){
        return $this->mathSql('MIN',$col,$arg);
    }
    public function max($col,$arg){
        return $this->mathSql('MAX',$col,$arg);
    }
    private function arrToSql($arr){
        $res=[];
        foreach($arr as $key=>$val){
            $res[]="`$key`='$val'";
        }
        return $res;
    }
    private function mathSql($math,$col,$arg){
        $sql="SELECT $math($col) FROM `$this->table` ";
        if(is_array($arg)){
            $sql.=" WHERE ".join(" AND ",$this->arrToSql($arg));
        }elseif($arg!=1){
            $sql.=$arg;
        }
        return $this->pdo->query($sql)->fetchColumn();
    }
}

function q($sql){
    global $pdo;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function to($url){
    header("location:".$url);
}

$Total=new DB('total');
$User=new DB('user');
$Que=new DB('que');
$Log=new DB('log');
$News=new DB('news');

if(!isset($_SESSION['visit'])){
    $_SESSION['visit']=1;
    $total=$Total->find(['date'=>date("Y-m-d")]);
    if(empty($total)){
        $total['date']=date("Y-m-d");
    }else{
        $total['total']+=1;
    }
    $Total->save($total);
}
?>