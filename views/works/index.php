


<?php 
if (isset($_GET['store']) && $_GET['store'] == 1) {
  echo '<div class="alert alert-success">Work created successfully</div>';
}
if (isset($_GET['update']) && $_GET['update'] == 1) {
  echo '<div class="alert alert-success">Work updated successfully</div>';
}
if (isset($_GET['delete']) && $_GET['delete'] == 1) {
  echo '<div class="alert alert-success">Work deleted successfully</div>';
}
?>


<div class="page-header">

  <div class="pull-right form-inline">
    <div class="btn-group">
      <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
      <button class="btn btn-default" data-calendar-nav="today">Today</button>
      <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
    </div>
    <div class="btn-group">
      <button class="btn btn-warning" data-calendar-view="year">Year</button>
      <button class="btn btn-warning active" data-calendar-view="month">Month</button>
      <button class="btn btn-warning" data-calendar-view="week">Week</button>
      <button class="btn btn-warning" data-calendar-view="day">Day</button>
    </div>
  </div>

  <h3></h3>
  <small>Fork on <a href="https://github.com/Serhioromano/bootstrap-calendar">github</a> for the Author </small>
</div>


<div id="calendar"></div>

<div class="row text-center" style="padding: 40px 0;">@2018 <a href="https://giangvincent.org">giang vincent</a></div>
<div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Event</h3>
      </div>
      <div class="modal-body" style="height: 400px">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><!-- detail work popup -->

<!-- create form -->
<div class="modal fade" id="createForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Work Create Form</h4>
      </div>
      <form action="index.php?controller=works&action=store" method="POST" >
      <div class="modal-body">
        <p><small>Datetime picker from <a href="https://github.com/Eonasdan/bootstrap-datetimepicker">Eonasdan</a></small></p>
        <div class="form-group">
          <label for="exampleInputEmail1">Name work</label>
          <input class="form-control" type="text" name="name" id="name" placeholder="Tên công việc" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Start date</label>
          <div class='input-group date' id='datetimepicker1'>
              <input type="text" name="sdate" id="sdate" placeholder="YYYY-MM-DD" class="form-control" required >
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
          
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">End date</label>
          <div class='input-group date' id='datetimepicker2'>
              <input class="form-control" type="text" name="edate" id="edate" placeholder="YYYY-MM-DD" required>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
          
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Work Status</label>
          <select name="status" id="status" class="form-control">
            <option value="planning">Planning</option>
            <option value="doing">Doing</option>
            <option value="complete"></option>
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


