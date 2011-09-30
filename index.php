<?php 
/*
	Qwik PHP - An easy way to manage snippets of code and test them 
    Copyright (C) 2011  Debarshi Banerjee, Laddu!

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program <license.txt>.  If not, see <http://www.gnu.org/licenses/>.
	
	e: debarshi.ban@gmail.com
	w: scriptingtheweb.com
*/
session_start();

 if (file_exists('./config.php'))
    require_once './config.php';
 else
 	die("Fata Error: Application Could Not Load");		
		
 require_once $engine . ".php";		
