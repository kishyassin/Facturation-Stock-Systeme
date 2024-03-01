<?php 
        const DBHOST = 'localhost';        // Database Hostname
        const DBUSER = 'root';             // MySQL Username
        const DBPASS = '';                 // MySQL Password
        const DBNAME = 'facture_app';  // MySQL Database name

        $conn = new Mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
