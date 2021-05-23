# PAW_TP_Obligatorio

* Guía: https://docs.google.com/document/d/1TXdyq_OcBliM3XIY0MeFgh8HiaCFsFsO66Rj9i6fmfo

## TP1:
* Consignas: https://docs.google.com/document/d/1YarTQV2igJM-NpjWWiQj5ejkje6vs8wMSFC9EiUB9q8
* Wireframes: https://www.figma.com/team_invite/redeem/m52W7WvPRiBnjfXHrxDjbY

## TP2:

* Consignas: https://docs.google.com/document/d/1HvIJB_lH6pm-cDgj8y6AJtPXr_i5wDlToiXXgrcVhpQ


## TP3:

* Consignas: https://docs.google.com/document/d/1OaPIsRdc1pQ-N-6TLhcrsA-zzhx0Q4uYV_TGMx8bo60

Para correr el sistema se requiere:
* Instalar dependencias:

        composer install
* Configurar .env, se puede hacer basándose en .env.example.

* Migrar base de datos:

    * Windows:

            vendor\robmorgan\phinx\bin\phinx.bat migrate -e development
    * Linux:

            phinx migrate -e development
    
* Iniciar el servidor:

        php -S localhost:8081 -t public

### Arquetipo, estructura del proyecto.

Paquete principal:

        src/clinical

Se agruparon las clases que son llamadas por RouterService en

        src/clinical/controllers

Clases auxiliares que manejan la persistencia de datos

        src/clinical/database

Clases que tienen información de las entidades en la base de datos

        src/clinical/database/models

Clases que contienen la lógica de las operaciones que se realizan en la base de datos

        src/clinical/database/repositories

Excepciones

        src/clinical/exceptions

Clases con la lógica de la aplicación

        src/clinical/services

Traits

        src/clinical/traits

Vistas

        src/clinical/views

## TP4:

* Consignas: https://docs.google.com/document/d/1_J28aWqV1XHemlGJ0r7KT_zMdJPP_y7Q3KInprGjC54