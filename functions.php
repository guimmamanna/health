<?php
require_once( "sparql_library.php" );

class Functions{
    private $db;
    
    public function __construct(){
	$db = sparql_connect( "http://localhost:3030/health/query" );
	if( !$db ) { print sparql_errno() . ": ---" . sparql_error(). "\n"; exit; }
	sparql_ns( "health","http://www.health.com/ontology#" );
    }
    public function get_patients(){
        $sparql = "SELECT * 
WHERE{
  ?x a health:Patient.
  ?x health:f_name ?FirstName.
  ?x health:l_name ?LasttName.
}
        }";
        $result = sparql_query( $sparql ); 
        return $result;
    }
    public function get_residents() {
        $sparql = "SELECT ?Person
WHERE{
  ?Person health:address "Cambridge".
 
}
            }";
        $result = sparql_query( $sparql ); 
        if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
        return $result;   
    }
    
    public function get_coronavirus($coronavirus) {
        $sparql = " SELECT ?Person ?l_name ?f_name ?Disease
WHERE{
  
  ?Person health:l_name ?l_name.
   ?Person health:f_name ?f_name.
   ?Person health:Disease ?Disease.
  
 FILTER regex(?Disease, "coronavirus")
 
}"'.
            }";
        $result = sparql_query( $sparql ); 
        if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
        return $result;   
    }
}
?>