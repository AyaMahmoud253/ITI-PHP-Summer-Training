console.log("Task 1");
let a = 5;
let b = 10;
console.log("Before swap:");
console.log("a =", a);
console.log("b =", b);
[a, b] = [b, a];
console.log("After swap:");
console.log("a =", a);
console.log("b =", b);
console.log("-----------------------------------------------------------------------");

console.log("Task 2");
function findMinMax(...values) {
    const maxValue = Math.max(...values);
    const minValue = Math.min(...values);
    return { max: maxValue, min: minValue };
  }
  const numbers = [4, 9, 2, 7, 5];
  const result = findMinMax(...numbers);
  console.log("Max value:", result.max);
  console.log("Min value:", result.min);
  console.log("------------------------------------------------------------------------");

console.log("Task 3");
var fruits = ["apple", "strawberry", "banana", "orange", "mango"];
const isAllStrings = fruits.every((fruit) => typeof fruit === "string");
console.log("Are all elements strings?", isAllStrings);
const hasSomeStartingWithA = fruits.some((fruit) => fruit.startsWith("a"));
console.log("Do some elements start with 'a'?", hasSomeStartingWithA);
const filteredArray = fruits.filter((fruit) =>
  fruit.startsWith("b") || fruit.startsWith("s")
);
console.log("Filtered array:", filteredArray);
const likeFruitArray = fruits.map((fruit) => `I like ${fruit}`);
console.log("Array with liking declarations:", likeFruitArray);
likeFruitArray.forEach((fruit) => console.log(fruit));

