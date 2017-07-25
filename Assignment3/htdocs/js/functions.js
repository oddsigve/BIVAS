		    function spec_change(select)
		    {	

		    	alert("IN : spec_change");
		    	alert(selct.value);
		    	data = select.value;
		        $.ajax({
	                type: "POST",
	                url: "../php/spec_process.php",
	                data: {spec: data},
	                dataType:'JSON', 
	                success: function(result){
	                	alert(result[0]);
	                    var container = document.getElementById("spec_div");

						var para = document.createElement("p");
						var node = document.createTextNode(result[0]);
						para.appendChild(node);

						container.appendChild(para);
	                }
		        });
		    }

		    	    	function check(){
	    		checkbox = document.getElementById("electric");
	    		checkbox.value="true";
	    		checkbox.checked = true;
	    	}

	    		        function addSpec(){
	            // Container <div> where dynamic content will be placed
	            var container = document.getElementById("spec_div");
	            // Create an <input> element, set its type and name attributes
	            //var input_spec = document.createElement("input");
	            //input_spec.type = "text";
	            //input_spec.name="spec" + number;
	            //container.appendChild(input_spec);

	            //var input_m = document.createElement("input");
	            //input_m.type = "text";
	            //input_m.name="measurment" + number;
	            //container.appendChild(input_m);

	            //var button = document.createElement("button");
	            //button.addEventListener("click", rm(), false);
	            //button.innerHTML = "Delete";
	            //container.appendChild(button);

	           	//number++;

	           	//Create and append select list
				var selectList = document.createElement("select");
				selectList.id = "mySelect";

				/*
				selectList.addEventListener(
	     				'change',
	     					function() { spec_change(this); },
	     					false
	  			);*/
	  			selectList.onchange = function(){spec_change(this);};


				//selectList.setAttribute("onchange", spec_change());
				//selectList.onchange = "spec_change(this)";
				container.appendChild(selectList);
				//Create and append the options
				for (var i = 0; i < arrayObjects.length; i++) {
				    var option = document.createElement("option");
				    option.value = arrayObjects[i];
				    option.text = arrayObjects[i];
				    selectList.appendChild(option);
				}
	        }