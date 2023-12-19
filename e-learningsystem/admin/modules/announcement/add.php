<?php 
                      include('../lesson/read-scriptLesson.php');
                      if (!isset($_SESSION['USERID'])){
                        redirect(web_root."admin/index.php");
                      }
                      ?> 
                      <div class="container">
                       <form class="form-horizontal span6" action="controller.php?action=add" method="POST" style="margin-top: 20px;"> 

                        <div class="row">
                         <div class="col-lg-12">
                         <h1 class="page-header">Add New Announcement</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                      </div> 

                      <div class="form-group">
                        <div class="col-md-11">
                          <label for=
                          "title">Title:</label>

                          <div class="col-md-12"> 
                          <input style="width: 70%" class="form-control input-sm" id="title" name="title" placeholder=
                           "Enter title" type="text" value="">
                          </div>
                        </div>
                      </div> 
                      <div class="form-group">
                        <div class="col-md11">
                          <label  for=
                          "publishDate">Publish date:</label>

                          <div class="col-md-12">
                          <input style="width: 70%" class="form-control input-sm" id="publishDate" name="publishDate" placeholder=
                           "Enter publish date" type="date" value="">
                            
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-11">
                          <label  for=
                          "content">Content</label>

                          <div class="col-md-12">
                          <textarea style="width: 70%" class="form-control input-sm" id="content" name="content" placeholder=
                            "Enter content" type="text"></textarea>
                           
                         </div>
                       </div>
                     </div>

                     
                

               <div class="form-group">
                <div class="col-md-11">
                  <label  for=
                  "idno"></label>

                  <div class="col-md-12">
                   <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                 </div>
               </div>
             </div> 
           </form>
         </div>
