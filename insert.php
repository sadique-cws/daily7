<?php include_once "dbconnect.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<?php include_once "header.php";?>



<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Insert Post</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Create new Post on Portal.</p>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
     <form action="insert.php" method="post" enctype="multipart/form-data">
     <div class="flex flex-wrap -m-2">
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">title</label>
            <input type="text" id="name" name="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">author</label>
            <input type="text" id="name" name="author" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="email" class="leading-7 text-sm text-gray-600">category</label>
            <input type="email" id="email" name="category" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          <div class="relative">
            <label for="date" class="leading-7 text-sm text-gray-600">Date</label>
            <input type="date" id="date" name="date" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-full">
          <div class="relative">
            <label for="message" class="leading-7 text-sm text-gray-600">Content</label>
            <textarea id="message" name="content" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>
        </div>
        <div class="p-2 w-full">
          <div class="relative">
            <label for="message" class="leading-7 text-sm text-gray-600">Upload Image</label>
            <input type="file" name="post_image" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-white focus:ring-2 focus:ring-red-200 h-auto text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"/>
          </div>
        </div>
        <div class="p-2 w-full">
          <input type="submit" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg" value="create post" name="send"/>
        </div>
       
      </div>
     </form>
    </div>
  </div>
</section>
    
</body>
</html>

<?php 
if(isset($_POST['send'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $author = $_POST['author'];
    $category = $_POST['category'];

    // image work
    $file = $_FILES['post_image']['name'];
    $tmp_file = $_FILES['post_image']['tmp_name'];

    move_uploaded_file($tmp_file,"images/$file");

    $query = mysqli_query($con, "insert into posts (title, author, content, date, category, post_image) value ('$title','$author','$content','$date','$category','$file')");
    if($query){
        echo "<script>window.open('index.php','_self')</script>";
    }
}