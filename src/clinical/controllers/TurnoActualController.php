<?php


namespace src\clinical\controllers;


class TurnoActualController extends Controller
{
    private $turnos_array =
                            array("1" => array("id" => "1",
                                "paciente" => "Federico Ledesma",
                                "consultorio" => "1",
                                "horario" => "09:00",
                                "estado" => "llamando"),
                            "2"=>array(  "id" => "2",
                                    "paciente" => "Ledesma Federico",
                                    "consultorio" => "2",
                                    "horario" => "09:00",
                                    "estado" => "llamando"),
                            "4"=>array(
                                    "id" => "4",
                                    "paciente" => "Nicolas Larena",
                                    "consultorio" => "4",
                                    "horario" => "09:00",
                                    "estado" => "llamando")
                        );

    private $turnos = array();
    public function get() : void {
        $this->pageFinderService->findFileRute("turnoActual");
    }

    public function put() :void {
        //Los estados de los turnos pueden ser: llamando; pendiente; atendiendo; atendido; cancelado
        //{idConsultorio => idTurno}
        // TODO: Persistir toda la estructura de turnos en la base de datos para poder actualizarla
        
        $this->turnos = [
            [
                "id" => "1",
                "paciente" => "Federico Ledesma",
                "consultorio" => "1",
                "horario" => "09:00",
                "estado" => "llamando"
            ],
            [
                "id" => "2",
                "paciente" => "Ledesma Federico",
                "consultorio" => "2",
                "horario" => "09:00",
                "estado" => "llamando"
            ],
            [
                "id" => "3",
                "paciente" => "Nicolas Larena",
                "consultorio" => "3",
                "horario" => "09:00",
                "estado" => "llamando"
            ],
            [
                "id" => "4",
                "paciente" => "Nicolas Larena",
                "consultorio" => "4",
                "horario" => "09:00",
                "estado" => "llamando"
            ],
            [
                "id" => "5",
                "paciente" => "Nicolas Larena",
                "consultorio" => "5",
                "horario" => "09:00",
                "estado" => "llamando"
            ],
            [
                "id" => "6",
                "paciente" => "Nicolas Larena",
                "consultorio" => "6",
                "horario" => "09:00",
                "estado" => "llamando"
            ]
        ];
        $mensaje = array ("estado" => "true", "success" => "exito","turnos" => $this->turnos);
       
        echo json_encode($mensaje);
    }

    public function getMisTurnos() : void {
        $this->pageFinderService->findFileRute("misTurnos");
    }

    
    public function actualizarMisTurnos()
    {
        $json = json_decode(file_get_contents('php://input'));

        $this->turnos_array[$json->consultorio] = array("id" => "1",
                                "paciente" => $json->paciente,
                                "consultorio" => $json->consultorio,
                                "horario" => $json->horario,
                                "estado" => $json->estado);
        $mensaje = array ("estado" => "true", "success" => "exito","turnos" => $this->turnos_array);
        echo json_encode($mensaje);
    }
}