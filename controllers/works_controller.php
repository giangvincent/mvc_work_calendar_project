<?php
require_once('controllers/base_controller.php');
require_once('models/work.php');

class WorksController extends BaseController
{
  function __construct()
  {
    $this->folder = 'works';
  }

  public function index()
  {
    $works = Work::all();
    $data = array('works' => $works);
    $this->render('index', $data);
  }

  public function json()
  {
    $start = $_REQUEST['from'] / 1000;
    $end   = $_REQUEST['to'] / 1000;
    
    $works = Work::listWork($start , $end);
    $out = array();
    foreach($works as $row) {
        $out[] = array(
            'id' => $row->id,
            'title' => $row->name,
            'url' => 'index.php?controller=works&action=detail&id='.$row->id,
            'start' => strtotime($row->start_date) . '000',
            'end' => strtotime($row->end_date) .'000',
            'class' => 'work-'.strtolower($row->status)
        );
    }

    echo json_encode(array('success' => 1, 'result' => $out));
  }

  public function detail()
  {
    $work = Work::find($_GET['id']);
    $data = array('work' => $work);
    require_once('views/works/detail.php');
  }

  public function create()
  {
    # code...
  }

  public function store()
  {
    $work = Work::store($_POST);
    header('Location: index.php?controller=works&store=1');
  }

  public function edit()
  {
    $work = Work::find($_GET['id']);
    $data = array('work' => $work);
    $this->render('edit', $data);
  }

  public function update()
  {
    $work = Work::update($_POST , $_GET['id']);
    if ($work) {
      echo 'Updated success';
    }
    $work = Work::find($_GET['id']);
    $data = array('work' => $work);
    header('Location: index.php?controller=works&update=1');
  }

  public function delete()
  {
    $work = Work::delete($_GET['id']);
    if (isset($work)) {
      header('Location: index.php?controller=works&delete=1');
    }
  }
}