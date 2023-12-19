                      <?php 
                    if(!isset($_SESSION['USERID'])){
  redirect(web_root."admin/index.php");
}
   
                       ?> 
<div class="container">
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

           <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Upload New Lesson</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

            <div class="form-group">
                    <div class="col-md-11">
                      <label for=
                      "LessonSubject">Subject Name</label>

                      <div class="col-md-12">

                         <input style="width: 80%"class="form-control" id="LessonSubject" name="LessonSubject" placeholder=
                            "Enter subject name" type="text" value="">
                      </div>
                    </div>
                  </div>
                      
                   <div class="form-group">
                    <div class="col-md-11">
                      <label for=
                      "LessonTopic">Topic Name</label>
                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                         <input style="width: 80%" class="form-control" id="LessonTopic" name="LessonTopic" placeholder=
                            "Enter topic name" type="text" value="">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-11">
                      <label  for=
                      "Category">Select File Type:</label>

                      <div class="col-md-12">

                         <select style="width: 83%" class="form-control" id="Category" name="Category" >
                            <option>Docs</option>
                            <option>Video</option>
                         </select>
                      </div>
                    </div>
                  </div>

<div class="form-group">
                    <div class="col-md-11">
                      <label for=
                      "LessonDescription">Description</label>
                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                         <textarea rows="3" style="width: 80%" class="form-control" id="LessonDescription" name="LessonDescription" placeholder=
                            "Enter Description" type="text" value="">
                         </textarea> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-11">
                      <label for=
                      "LessonDate">Publish Date</label>
                      <div class="col-md-10">
                        <input name="deptid" type="hidden" value="">
                         <input style="width: 80%" class="form-control" id="LessonDate" name="LessonDate" placeholder=
                            "Enter date" type="date" value="">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-11">
                      <label for=
                      "file">Upload File:</label>

                      <div class="col-md-10">
                      <input type="file" name="file"/>
                      </div>
                    </div>
                  </div>
 
             <div class="form-group">
                    <div class="col-md-11">
                      
                      <div class="col-md-10">
                       <button style="margin-bottom: 10px;"class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                         </div>
                    </div>
              </div> 
        </form> 
</div>