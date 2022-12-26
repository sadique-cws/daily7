<?php include_once 'dbconnect.php';?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <script src='https://cdn.tailwindcss.com'></script>
</head>
<body>

<?php include_once 'header.php';?>




<section class='text-gray-600 body-font'>
  <div class='container px-5 py-24 mx-auto'>
  
    <div class='flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4'>
      <?php 
      $query = mysqli_query($con, 'select * from posts');
      while($row = mysqli_fetch_array($query)){
        $id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $author = $row['author'];
        $category = $row['category'];
        $date = $row['date'];
        $file = $row['post_image'];
        echo "
        <div class='p-4 md:w-1/3 sm:mb-0 mb-6'>
        <div class='rounded-lg h-64 overflow-hidden'>
          <img alt='content' class='object-cover object-center h-full w-full' src='images/$file'>
        </div>
        <h2 class='text-xl font-medium title-font text-gray-900 mt-5'>$title</h2>
        <div clas='flex'>
            <span class='text-slate-300'>$author</span>
            <span class='text-slate-300'>$date</span>
        </div>
        <p class='text-base leading-relaxed mt-2'>$content</p>
        <a class='text-red-500 inline-flex items-center mt-3'>Read More
          <svg fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' class='w-4 h-4 ml-2' viewBox='0 0 24 24'>
            <path d='M5 12h14M12 5l7 7-7 7'></path>
          </svg>
        </a>
      </div>
      ";
      }
      
      ?>
   
    </div>
  </div>
</section>

    
</body>
</html>