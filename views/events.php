<?php 
include 'views/header.php';
if(!Session::checkSession()){
    echo '<script>window.location="login"</script>';
}else{  
?>
<div id="wrapper">
    	<?php include 'views/sidebar.php'?>
    	<div id="page-wrapper">
    		<div class="col-lg-12">
            <button class="btn btn-sm btn-primary" onclick="window.location='addevent.html'">Add</button>
            <button class="btn btn-sm btn-info" onClick="window.print()">Print</button>
           
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Events</h3>
                  </div>
              <div class="panel-body">
            <div class="table-responsive">
    		<table class="table table-bordered table-hover table-striped tablesorter" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S/NO<i class="fa fa-sort"></i></th>
                        <th>Event<i class="fa fa-sort"></i></th>
                        <th>Description<i class="fa fa-sort"></i></th>
                        <th>Organiser<i class="fa fa-sort"></i></th>
                        <th>Date<i class="fa fa-sort"></i></th>
                        <th>Date Created<i class="fa fa-sort"></i></th>
                        <th>Action<i class="fa fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $event= Events::getEvents();
                $index= 1;
                foreach ($event as $key => $value) { ?>
                    <tr>
                        <td><?php echo $index?></td>
                        <td><?php echo ucfirst($value['event'])?></td>
                        <td><?php echo ucfirst($value['description'])?></td>
                        <td><?php echo ucfirst($value['organiser'])?></td>
                        <td><?php echo $value['date']?></td>
                        <td><?php echo $value['date_created']?></td>
                        <td>
                            <a href="delevent?id=<?php echo $value['id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                            <a href="editevent?q=<?php echo $value['id']?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>    
                        </td>
                    </tr>
                    
                <?php $index++; }?>
                </tbody>
            </table>
            </div>
         </div>
     </div>
    </div>
    </div>
</div>

    	
<?php }?>   