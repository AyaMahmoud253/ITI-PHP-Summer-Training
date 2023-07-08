//task1
var n1=prompt("Enter the first number to get larger:");
var n2=prompt("Enter the second number to get larger:");

if(n1>n2)
{
    document.write("The larger number "+n1+" , "+n2+" is: " + n1);
}
else if(n1<n2)
{
    document.write("The larger number "+n1+" , "+n2+" is: "+ n2);
}
else if(n1==n2)
{
    document.write("Both numbers are equal");
}
document.write("<br>");
document.write("<br>");


//task2
var num1=prompt("Enter the first number to to sum or triple sum: ");
var num2=prompt("Enter the second number to to sum or triple sum: ");
if (num1 === num2) {
    var result = (parseFloat(num1)+parseFloat(num2)) * 3;
    document.write("The triple sum "+num1+" , "+num2+" is: " + result);
  } else {
    var result = (parseFloat(num1)+parseFloat(num2));
    document.write("The sum "+num1+" , "+num2+" is: " + result);
  }
  document.write("<br>");


//task3
var name=prompt("Enter name(ul task): ");
var number=prompt("Enter num (ul task): ");
document.write("<ul>");
  for (var i = 0; i < number; i++) {
    document.write("<li> *Hello, " + name + "</li>");
  }
  document.write("</ul>");
  document.write("<br>");


  //task4
  var numb=prompt("Enter num to check if even or odd: ");
  if (numb % 2 === 0) {
    document.write(numb + " is even.");
  } else {
    document.write(numb + " is odd.");
  }

