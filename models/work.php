<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
class Work
{
  public $id;
  public $name;
  public $detail;
  public $start_date;
  public $end_date;
  public $status;

  function __construct($id, $name, $detail, $start_date, $end_date, $status)
  {
    $this->id = $id;
    $this->name = $name;
    $this->detail = $detail;
    $this->start_date = $start_date;
    $this->end_date = $end_date;
    $this->status = $status;
  }

  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM works WHERE id = :id');
    $req->execute(array('id' => $id));

    $item = $req->fetch();
    if (isset($item['id'])) {
      return new Work($item['id'], $item['name'], $item['detail'], $item['start_date'] , $item['end_date'], $item['status']);
    }
    return null;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM works');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Work($item['id'], $item['name'], $item['detail'], $item['start_date'] , $item['end_date'], $item['status']);
    }

    return $list;
  }

  static function store($data)
  {
    $db = DB::getInstance();
    $statement = $db->prepare("INSERT INTO works(name, detail, start_date, end_date , status)
      VALUES(:name, :detail, :sdate, :edate ,:status)");
    $statement->execute(array(
      "name" => $data['name'],
      "detail" => $data['detail'],
      "sdate" => date('Y-m-d H:i:s',strtotime($data['sdate'])),
      "edate" => date('Y-m-d H:i:s',strtotime($data['edate'])),
      "status" => $data['status']
    ));
    return $statement;
  }

  static function update($data , $id)
  {
    $db = DB::getInstance();
    $sql = "UPDATE `works`   
           SET `name` = :name,
                `detail` = :detail,
               `start_date` = :sdate,
               `end_date` = :edate,
               `status` = :status 
         WHERE `id` = :id
    ";
    $statement = $db->prepare($sql);
    $count = $statement->execute(array(
      "name" => $data['name'],
      "detail" => $data['detail'],
      "sdate" => date('Y-m-d H:i:s',strtotime($data['sdate'])),
      "edate" => date('Y-m-d H:i:s',strtotime($data['edate'])),
      "status" => $data['status'],
      "id" => $id
    ));
    return $count;
  }

  static function delete($id)
  { 
    $db = DB::getInstance();
    $sql = "DELETE FROM `works` WHERE id = ?";        
    $q = $db->prepare($sql);

    $response = $q->execute(array($id));  
    return $response;
  }

  public static function listWork($start , $end)
  {
    #echo date('Y-m-d h:i', $start).' - '.date('Y-m-d h:i', $end);
    $list = [];
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM works WHERE `start_date` BETWEEN :start and :stop');
    $req->execute(
      array(
        'start' => date('Y-m-d', $start) , 
        'stop' => date('Y-m-d', $end) 
      )
    );
    /*$sql   = sprintf('SELECT * FROM works WHERE `start_date` BETWEEN %s and %s',
        $db->quote(date('Y-m-d', $start)), $db->quote(date('Y-m-d', $end)));
    $req = $db->query($sql);*/

    foreach ($req->fetchAll() as $item) {
      $list[] = new Work($item['id'], $item['name'], $item['detail'], $item['start_date'] , $item['end_date'], $item['status']);
    }

    return $list;
  }
}