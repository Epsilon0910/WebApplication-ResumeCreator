function myFunction(){
    var college-name = document.getElementById("college-name").value;
    var para = document.createElement("h5");
    var node = document.createTextNode(college-name);
    para.appendChild(node);

    var element = documetn.getElementById("education-container");
    element.appendChild(para);
}
