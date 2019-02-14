<?php
require_once 'core/init.php';
require_once 'script/functions.php';

if (Input::exists()) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      'title' => array(
          'required' => true,
          'unique' => 'movie',
          'min' => 2,
          'max' => 50
      ),
    //   'year' => array(
    //     // 'required' => false,
    //     'max' => 4
    //   ),
      'duration' => array(
        'min' => 2,
        'max' => 3
      ),
      'FSK' => array(
        'min' => 2,
        'max' => 6
      ),
    //   'cover' => array(
        // 'min' => 7
    //   ),
    ));
    if ($validation->passed()) {
        // echo 'passed the validation';
        $movie = new Movie();
        // print_r(  $movie);
        try {
          $movie->insertMovie(array(
              'title' => Input::get('title'),
              'year' => Input::get('year'),
              'duration' => Input::get('duration'),
              'FSK' => Input::get('FSK'),
            'cover' => Input::get('cover'),
            ));
          ' <script type="text/javascript">
                  alert("Thank you")
                 </script>';
          // Redirect::toPage('index.php');

        } catch (Exception $e) {
          die($e->getMessage());
        }

    } else {
      foreach ($validation->getErrors() as $error) {
        echo $error, '<br>';
      }
    }
}

$genre = getAll('genre');
$getThem = getAll('movie');

// print_r($getThem);




?>


<?php
$user = new User();
if ($user->loggedIn()) {
    // echo ($user->getData()->username);
    ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
     <head>
       <meta charset="utf-8">
       <title>Library</title>
       <link rel="stylesheet" href="css/main.css">
       <link rel="stylesheet" href="css/library.css">
       
       <body>
           <?php include("script/header.php") ?>
           
           <main>
              
                    <div id="main-div" class="gallery">Movies will come here
                         <button id="showLayer" value="Add a new movie" onclick="showOverlay()">Add a new movie</button>
                        <div id="movie-div">
                         <?php
                            $mov = new Movie();
                            $mov->getMovie('Movie', 'movie', array('title', 'year','cover'));
                         ?>
                         </div>
                    </div>
                            <!-- <?php  
                                // $newMov = new Movie();
                                // $newMov->getMovie('movie', 'title');
                            ?> -->

            <div id="overlay">
                <!-- <div id=clear-both></div> -->
            <form id="add-mv" action="" method="post" enctype="multipart/form-data" >
    <!-- enctype="multipart/form-data"  upload related -->
                    <div id="row1">                                         
                        <input id="title" type="text" placeholder="Title" name="title" value="<?php echo Input::get('title'); ?>">
                    </div>

                    <div id="row2">
                        <input id="year" type="text" placeholder="year" name="year" value="<?php echo Input::get("year"); ?>">
                    </div>

                    <div id="row3">
                        <input id="duration" type="text" placeholder="film duration" name="duration" value="<?php echo Input::get("duration"); ?>">
                    </div>

                    <div id="row4">
                        <input id="FSK" type="text" placeholder="FSK" name="FSK" value="<?php echo Input::get("FSK"); ?>">
                    </div>

                    <div id="row5">
                        <input id="cover" type="text" value="" placeholder="cover" name="cover" value="<?php echo Input::get("cover"); ?>">
                    </div>
                    
                    <div id="genre">
                        <select>;
                        <option value=1>Select Genre</option>
                        <?php
                            foreach ($genre as $id => $name) {  
                            echo '<option class="opts" value='.$id.'>'.$name.'</option>';
                            };
                        ?>

                </select>
                    </div>

                    <div id="row6">
                        <button type="submit" id="add-mv" onclick='javascript: return submitFrom()'>Add movie</button>
                    </div>

                    <div id="row7">
                        <button id="abort" type="button" onclick="hideOverlay()">Abort</button>
                    </div>
                    <!-- end of overlay -->
                </form>
            </div>

    

    <div id="btn-div">


    <!-- end of gallery div -->
    </div>




</main>

<footer>
    <?php include("script/footer.php") ?>
</footer>

</body>
</html>

<?php
}else{
    echo 'Sorry, you need to <a href="signin.php">sign in</a> first';
}
?>


<script type="text/javascript">
    function showOverlay(){

        document.getElementById("main-div").style.display = "none";
        document.getElementById("overlay").style.display = "block";
    }
    function hideOverlay(){
        document.getElementById("overlay").style.display = "none";    
        document.getElementById("main-div").style.display = "block";
    }
</script>

<!-- <script type="text/javascript">
    function submitForm(){
        if(document.forms['add-mv'].onsubmit()){

            document.forms['add-mv'].action='';
        document.forms['add-mv'].submit();

        document.forms['add-mv'].action='upload.php';
        document.forms['add-mv'].submit();
        // document.form['add-mv'].target='upload.php';
    }
        return true;
        
    }
    </script> -->

