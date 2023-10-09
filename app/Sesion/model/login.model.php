<?php
    class Usuario {

         private int $IdUsuario;
        private string $Nombre;
        private string $Correo;
        private string $Password;

        public function __construct(
             int $IdUsuario = 0,
            string $Nombre,
            string $Correo,
            string $Password
        )
        {
             $this->IdUsuario = $IdUsuario;
            $this->Nombre = $Nombre;
            $this->Correo = $Correo;
            $this->Password = $Password;
        }

         public function getIdUsuario(): int {
             return $this->IdUsuario;
         }

        public function getNombre(): string {
            return $this->Nombre;
        }

        public function setNombre( string $Nombre ) {
            $this->Nombre = $Nombre;
        }

        public function getCorreo(): string {
            return $this->Correo;
        }

        public function setCorreo( string $Correo ) {
            $this->Correo = $Correo;
        }

        public function getPassword(): string {
            return $this->Password;
        }

        public function setPassword( string $Password ) {
            $this->Password = $Password;
        }
    }