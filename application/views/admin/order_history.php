<div class="row">
   <div class="col-md-12">
      <table class="table table-striped">
                            <thead>
                                <tr><th>ID</th>
                                <th>Update Date</th>
                                <th>Status</th>
                                <th>Comment</th>
                            </tr></thead>
                            <tbody>
                              
            <?php
			if(count($histories) > 0){
				foreach ($histories as $history){
					?>            
				<tr>
				
				   <td><?= $history['order_id']; ?></td>
				   <td><?= date('jS M Y h:i:s A', strtotime($history['date_added'])); ?></td>
				   <td><?= $history['status']; ?></td>
				   <td><?= $history['comments']; ?></td>
				</tr>
				
				<?php
				}
			}	
			
				?> 
                                  
                               
                            </tbody>
                        </table>
	  
	  
   </div>
</div>