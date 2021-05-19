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
* Migrar base de datos:

    * Windows:

            vendor\robmorgan\phinx\bin\phinx.bat migrate -e development
    * Linux:

            phinx migrate -e development
    
* Configurar .env, se puede hacer basándose en .env.example.

* Iniciar el servidor:

        php -S localhost:8081 -t public

## TP4:

* Consignas: https://docs.google.com/document/d/1_J28aWqV1XHemlGJ0r7KT_zMdJPP_y7Q3KInprGjC54