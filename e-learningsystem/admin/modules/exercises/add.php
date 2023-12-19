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
                         <h1 class="page-header">Add New Question</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                      </div> 

                      <div class="form-group">
                        <div class="col-md-11">
                          <label for=
                          "Lesson">Lesson:</label>

                          <div class="col-md-12"> 
                            <select style="width: 73%" class="form-control" name="Lesson">
                              <?php 
                              
                              foreach ($fetchData as $res) {
                                echo '<option value='.$res['LessonID'].'>'.$res['LessonSubject'].'</option>';
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div> 
                      <div class="form-group">
                        <div class="col-md11">
                          <label  for=
                          "Question">Question:</label>

                          <div class="col-md-12">
                            <textarea style="width: 70%" class="form-control input-sm" id="Question" name="Question" placeholder=
                            "Question Name" type="text"></textarea>
                            
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-11">
                          <label  for=
                          "ChoiceA">A:</label>

                          <div class="col-md-12">

                           <input style="width: 70%" class="form-control input-sm" id="ChoiceA" name="ChoiceA" placeholder=
                           "" type="text" value="">
                         </div>
                       </div>
                     </div>

                     <div class="form-group">
                      <div class="col-md-11">
                        <label  for=
                        "ChoiceB">B:</label>

                        <div class="col-md-12">

                         <input  style="width: 70%" class="form-control input-sm" id="ChoiceB" name="ChoiceB" placeholder=
                         "" type="text" value="" required>
                       </div>
                     </div>
                   </div>

                   <div class="form-group">
                    <div class="col-md-11">
                      <label  for=
                      "ChoiceC">C:</label>

                      <div class="col-md-12">

                       <input style="width: 70%" class="form-control input-sm" id="ChoiceC" name="ChoiceC" placeholder=
                       "" type="text" value="" required>
                     </div>
                   </div>
                 </div>
                 <div class="form-group">
                  <div class="col-md-11">
                    <label  for=
                    "ChoiceD">D:</label>

                    <div class="col-md-12">
                      <input style="width: 70%" class="form-control input-sm" id="ChoiceD" name="ChoiceD" placeholder=
                      "" type="text" value="" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-11">
                    <label  for=
                    "Answer">Answer:</label>

                    <div class="col-md-12">

                     <input style="width: 70%" class="form-control input-sm" id="Answer" name="Answer" placeholder=
                     "Answer" type="text" value="" required>
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
