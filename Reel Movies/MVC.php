<?php
    //Password
     define("PASSWORD","comingon201520");

    //Models 
    //Movie Model
     class Movie{
        public $name;
        public $year;
        public $id;
        public $avgrating;
    

        function Movie($n, $yr,$movieid,$rating){
            $this->name = $n;
            $this->year = $yr;
            $this->id = $movieid;
            $this-> avgrating = floatval($rating);
        }
     }
     
     class Rating{
         public $username;
         public $movie_id;
         public $rating;

         function Rating($user,$m_id,$rate){
             $this->username = $user;
             $this->movie_id = $m_id;
             $this->rating = $rate;
         }
     }

     class Role{
         public $actor_firstname;
         public $actor_lastname;
         public $moviename;
         public $role;
         public $year;

         function Role($f_name,$l_name,$movie,$rl,$yr){
             $this->actor_firstname = $f_name;
             $this->actor_lastname= $l_name;
             $this->moviename = $movie;
             $this->role = $rl;
             $this->year = $yr;
         }
     }
    //CONTROLS - data access functions
    
    //Getting genres from the databases
    function getGenres(){
    
        $genres = array();
        try{
        $con = new PDO("mysql:host=localhost;dbname=imdb","root",PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $conGen = $con->query("select distinct genre from movies_genres order by genre");
        $conGen->setFetchMode(PDO::FETCH_ASSOC);
    
        while($row = $conGen->fetch()){
            array_push($genres, $row['genre']);
        }
         $con=NULL;
    
         return $genres;
        }catch(PDOException $e){
        echo "Connection failed! ".$e->getMessage();
        }       
    }   
    
    //Gettings movies from selected genre
   function getMoviesByGenre($genre){
        $movies = array();
        try{
        $con = new PDO("mysql:host=localhost;dbname=imdb","root",PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $conGen = $con->query("select movies.id, movies.name, year,avg_rating from movies inner join movies_genres on movies.id = movie_id inner join avg_rating on movies.id = avg_rating.movie_id where genre = '$genre' order by movies.name");
        $conGen->setFetchMode(PDO::FETCH_ASSOC);
    
        while($row = $conGen->fetch()){
            $movie = new Movie($row['name'],$row['year'],$row['id'],$row["avg_rating"]);
            array_push($movies,$movie);
        }
         $con=NULL;
    
         return $movies;
        }catch(PDOException $e){
        echo "Connection failed! ".$e->getMessage();
        }       
    }
    
    //Getting actors and roles   
    function getMovieRoles($firstname,$lastname){
        $roles = array();
        try{
        $con = new PDO("mysql:host=localhost;dbname=imdb","root",PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $conGen = $con->query("select first_name, last_name,movies.name, role, year from actors inner join roles on actors.id=actor_id inner join movies on roles.movie_id=movies.id where first_name = '$firstname' && last_name = '$lastname' order by year");
        $conGen->setFetchMode(PDO::FETCH_ASSOC);
    
        while($row = $conGen->fetch()){
            $role = new Role($row['first_name'],$row['last_name'],$row['name'],$row['role'],$row['year']);
            array_push($roles,$role);
        }
         $con=NULL;
    
         return $roles;
        }catch(PDOException $e){
        echo "Connection failed! ".$e->getMessage();
        }      
    }

    //Get movies by name filter
    function getMoviesByName($name){
        $movies = array();
        try{
        $con = new PDO("mysql:host=localhost;dbname=imdb","root",PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $conGen = $con->query("select movies.id, movies.name, year,avg_rating.avg_rating from movies inner join avg_rating on movie_id = movies.id where name like '%$name%' order by name");
        $conGen->setFetchMode(PDO::FETCH_ASSOC);
    
        while($row = $conGen->fetch()){
            $movie = new Movie($row['name'],$row['year'],$row['id'],$row["avg_rating"]);
            array_push($movies,$movie);
        }
         $con=NULL;
    
         return $movies;
        }catch(PDOException $e){
        echo "Connection failed! ".$e->getMessage();
        } 
    }

    //Get user ratings
      function getUserRatings($m_id){
        $ratings = array();
        try{
        $con = new PDO("mysql:host=localhost;dbname=imdb","root",PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $conGen = $con->query("select username, movie_id, rating from ratings where movie_id = '$m_id'");
        $conGen->setFetchMode(PDO::FETCH_ASSOC);
    
        while($row = $conGen->fetch()){
            $rating = new Rating($row['username'],$row['movie_id'],$row['rating']);
            array_push($ratings,$rating);
        }
         $con=NULL;
    
         return $ratings;
        }catch(PDOException $e){
        echo "Connection failed! ".$e->getMessage();
        }      
    }

    //Inserting a user rating into
    function insertRating($movie_id,$username,$rating){
         try{
            $con = new PDO("mysql:host=localhost;dbname=imdb","root",PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $con->prepare("Insert into ratings(movie_id,username,rating) values(:movieid,:user,:rating)");
            $sth->bindParam(':movieid',$movie_id);
            $sth->bindParam(':user',$username);
            $sth->bindParam(':rating',$rating);
            $sth->execute();
            $con=NULL;     
            }catch(PDOException $e){
                echo "Connection failed! ".$e->getMessage();
            }      
    }

?>
