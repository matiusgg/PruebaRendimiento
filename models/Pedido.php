<?php
namespace models;
class pedido extends Conexion{

    // PROPIEDADES

    private $nombreProducto;
    private $ingredientes;
    private $precio;
    private $estado;
    private $categoria;
    private $imagen;
    private $cantidad;


     // CONSTRUCTOR

     public function __construct($servidor, $usuario, $password, $basededatos){

        $this->conexion = new \mysqli($servidor, $usuario, $password, $basededatos);
        
            }

    // METODOS

    
    public function InsertarPedido($request){


 
                  
                  
                  $producto = $this->conexion->query("select * from productos");

        // CREAMO SUN FOREACH PARA QUE $resultados, para uqe nos muestre los datos de la base de datos, en este caso dentro de [nosmbre de atributo].
        
        echo('<pre>');
        print_r($producto);
        echo('</pre>');

        foreach($producto AS $valor) {

            $this->categoria = $valor['categoria'];
            $this->nombreProducto = $valor['nombreProducto'];
            

            foreach($request AS $valorinput) {

                



                if(!empty($request)) {

                //     echo('<pre>');
                // print_r($request);
                // echo('</pre>');



                // echo('<pre>');
                // print_r($valorinput);
                // echo('</pre>');

                    if($this->nombreProducto == $valorinput){
                        

                


                $AtributosyDatos = [

                    'cantidad' => $request['unidad_' . $this->nombreProducto],
                    'id_productos' => $valor['id_productos'],
                    'nombreProducto' => $request[$this->nombreProducto]
                
                
                ];


                echo('<pre>');
                print_r($AtributosyDatos);
                echo('</pre>');

                


                $atributos = implode(", " , array_keys($AtributosyDatos));
				 
				 
				// creamos un nuevo array, para despues convertirlo en string con implode 
				  $i = 0;
				  foreach($AtributosyDatos as $key=>$valor) {

				   $dato[$i] = "'" . $valor . "'";
                      $i++;
                      
				  }
				  
				 // convertir el array anterio en un string
                  $datos = implode(", ", $dato);

                //Insertamos los valores en cada campo
                $this->conexion->query(" insert into elementospedido ($atributos) VALUES ($datos);");



                
                }

            }

            }
      


    }

}


public function mostrarEnvio($tabla1, $tabla2, $request) {

    
    $resultados = $this->conexion -> query('select p.id_productos, p.nombreProducto, p.ingredientes, p.precio, p.imagen, e.cantidad, p.categoria
        FROM ' . $tabla1 . ' as p
        JOIN ' . $tabla2 . ' as e
        ON p.id_productos = e.id_productos');
    
    // CREAMO SUN FOREACH PARA QUE $resultados, para uqe nos muestre los datos de la base de datos, en este caso dentro de [nosmbre de atributo].
    
    echo('<pre>');
    print_r($resultados);
    echo('</pre>');

    $total = 0;

    foreach($resultados AS $valor) {

        $this->categoria = $valor['categoria'];

      

        if($tabla1 == 'productos' and $tabla2 == 'elementospedido') {



    $this->nombreProducto = $valor['nombreProducto'];
    $this->imagen = $valor['imagen'];
    $this->ingredientes = $valor['ingredientes'];
    $this->precio = $valor['precio'];
    $this->cantidad = $valor['cantidad'];




            echo('<div class="productos_enviados">');


            echo('<ul>');
    
    
    
            echo('<div class="imagenProducto">');
    
    
            echo ('<img src="../_assets/img/productos/' . $this->imagen . '"');
            
            
            echo('</div>');
    
    
    
            echo('<li>');
    
            
            
            
            echo('Producto: ' . '<span>' . $this->nombreProducto . '</span>');
    
            
            
            echo('</li>');
    
            
            echo('<li>');
    
            
            
            echo('Ingredientes: ' . '<span>' . $this->ingredientes . '</span>');
    
            
            
            echo('</li>');
    
    echo('<li>');
    
    
            
            echo('Precio: ' . '<span>' . $this->precio . '</span>');

            echo('</li>');
            


            echo('<li>');
    
    
            
            echo('Cantidad: ' . '<span>' . $this->cantidad . '</span>');




            echo('</li>');



            
            echo('</ul>');
    
    
            
            echo('<div>');

$precioCantidad = $this->cantidad * $this->precio;
    
echo('PRECIO * CANTIDAD: ' . $precioCantidad);

echo('<br>');


// $total += $precioCantidad;

// echo('TOTAL: ' . $total);

        

}



}


}

// public function mostrarEnvio($tabla1, $tabla2, $request) {

    
//     $resultados = $this->conexion -> query('select p.id_productos, p.nombreProducto, p.ingredientes, p.precio, p.imagen, e.cantidad, p.categoria
//         FROM ' . $tabla1 . ' as p
//         JOIN ' . $tabla2 . ' as e
//         ON p.id_productos = e.id_productos');
    
//     // CREAMO SUN FOREACH PARA QUE $resultados, para uqe nos muestre los datos de la base de datos, en este caso dentro de [nosmbre de atributo].
    
//     echo('<pre>');
//     print_r($resultados);
//     echo('</pre>');

//     $total = 0;

//     foreach($resultados AS $valor) {

//         $this->categoria = $valor['categoria'];

      

//         if($tabla1 == 'productos' and $tabla2 == 'elementospedido') {

//             $this->nombreProducto = $valor['nombreProducto'];
//     $this->imagen = $valor['imagen'];
//     $this->ingredientes = $valor['ingredientes'];
//     $this->precio = $valor['precio'];
//     $this->cantidad = $valor['cantidad'];

    

//     echo('<li>');
    
    
            
//     echo('TOTAL: ' . '<span>' . $this->cantidad . '</span>');




//     echo('</li>');

//         }


//     }


// }

}


?>