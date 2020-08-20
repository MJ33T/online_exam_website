<?php header("content-type: text/css; charset: UTF-8") ?>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');

*{
	margin: 0;
	padding: 0;
}


html, body{
	height: 100%;
	margin: 0;
}
body{
	display: flex;
	flex-direction: column;
}


li, a, button{
	font-family: 'Montserrat', sans-serif;
	font-weight: 500;
	font-size: 16px;
	color: #ecf0f1;
	text-decoration: none;
}

header{
	
	height: 70px;
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 30px 10px;
	box-sizing: border-box;
	background-color: #24252A; 
}

.nav_link1{
	list-style: none;
}

.nav_link1 li{
	display: inline-block;
	
	padding-left: 100px;
}

.nav_link1 li a{
	transition: all 0.3s ease 0s;
}
.nav_link1 li a:hover{
	color: #0088a9;

}
.cta{
	padding-left: 790px;
	
}

.logout{
	padding-left: 20px;

}



button{
	padding: 9px 25px;
	background-color: rgba(0,136,169,1);
	border: none;
	border-radius: 50px;
	cursor: pointer;
	transition: all 0.3s ease 0s;
}

.footer{
	position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #24252A;
   color: white;
   text-align: center;
   padding: 30px 10px;

}

table, tr, td{
	border:1px solid black;
	padding: 10px;

	
}
.table{
	display: block;
	margin-left: auto;
	margin-right: auto;
	width: 24%;
	margin-top: 30px;
}

.create_form{
	background-color: grey;
	box-sizing: border-box;
	margin:  200px;
	margin-top: 100px;
	padding: 40px;

}

.inline{
	text-align: center;
	margin-top:10px;
	
}

.inline div{
	text-align: center;
	display: inline-block;
	padding: 0 10px;

}

.create_form label, input{
	font-size: 18px;
}

#qN{
	padding-right: 20px;
}
#qn{
	padding-right: 50px;
}

#qn input{
	margin-left: 10px;
	align-items: left;
	padding-right: 452px;
	text-align:left;
}

.submit_b{
	display: flex;
	justify-content: center;
	align-items: center;
	margin-top: 20px; 
}

.exam_list{
	background-color: grey;
	color: white;
	font-size: 1.25em;
	margin: 50px;
	padding: 20px;

}

.exam_list table{
	table-layout: fixed;
	color:white;
	width: 100%;
	text-align: center;


}

.exam_question_list{
	
	background-color: grey;
	color: white;
	margin: 50px 250px;
	padding: 20px;
	margin-bottom: 150px;
}

.inline_option div{
	display: inline-block;
	width: 40%;
	display: inline-block;
	padding: 10px 40px;

}

.exam_result{
	background-color: grey;
	color: white; 
	margin: 50px 250px;
	padding: 20px;
	margin-bottom: 150px;
}

.detail_result{
	background-color: grey;
	color: white;
	font-size: 1.25em;
	width: 50%;
	margin: 50px 350px;
	padding: 30px;
	margin-left: ;
	text-align: center;
}
.detail_result table{
	table-layout: fixed;
	color:white;
	width: 100%;
	text-align: center;
	
}

.detail_result a{
	padding: 9px 25px;
	background-color: rgba(0,136,169,1);
	color: white;
	border: none;
	border-radius: 50px;
	cursor: pointer;
	transition: all 0.3s ease 0s;	
}





