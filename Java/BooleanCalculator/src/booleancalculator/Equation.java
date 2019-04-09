package booleancalculator;

import java.util.ArrayList;
import java.util.Collections;

public class Equation {

//- - - INSTANCE VARIABLE - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private EquationList<Variable> currentEquation;
	private EquationList<Variable> knownVariables;
	private static Character[] acceptedNonADNumbers = {'+', '*', '(', ')'};
	private ArrayList<String> minterms;
	private ArrayList<String> maxterms;
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -
	
//- - - CONSTRUCTOR - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public Equation(String input) {
		
		currentEquation = new EquationList<Variable>();
		knownVariables = new EquationList<Variable>();
		currentEquation = parseEquation(input);
		minterms = new ArrayList<String>();
		maxterms = new ArrayList<String>();
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -
	
//- - - GETTER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public EquationList<Variable> getVariables() {
		
		Collections.sort(knownVariables, new VariableComparator());
		return knownVariables;
	}

	public int getVariableNumber() {
		
		return knownVariables.size();
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -	
	
//- - - PARSE - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private EquationList<Variable> parseEquation(String input) {
		
		EquationList<Variable> returnArray = stringToRawEquation(input);
		addMultiplicationOperands(returnArray);
		return returnArray;
	}
	
	private EquationList<Variable> stringToRawEquation(String inputString) {
		
		EquationList<Variable> returnArray = new EquationList<Variable>();
		Variable addedValue;
		for (int i = 0; i < inputString.length(); i++) {
			addedValue = new Variable (inputString.charAt(i));
			if (Character.isLetter(inputString.charAt(i))) {
				if (i != inputString.length() - 1 && inputString.charAt(i + 1) == '!') {
					addedValue = new Variable(inputString.charAt(i), true);
					returnArray.add(addedValue);
					i++;
				} else {
					addedValue = new Variable(inputString.charAt(i), false);
					returnArray.add(addedValue);
				}
				boolean isAVariable = false;
				for (int j = 0; j < knownVariables.size(); j++) {
					if (addedValue.getCharValue() == knownVariables.get(j).getCharValue()) {
						isAVariable = true;
					}
				}
				if (!isAVariable) {
					knownVariables.add(new Variable(addedValue));
				}
			} else {
				returnArray.add(addedValue);
			}
		}
		return returnArray;
	}
	
	private void addMultiplicationOperands(EquationList<Variable> inputEquation) {
		
		for (int i = inputEquation.size() - 1; i >0; i--) {
			if (Character.isLetter(inputEquation.get(i).getCharValue()) && Character.isLetter(inputEquation.get(i - 1).getCharValue())) {
				inputEquation.add(i, new Variable('*'));
			} else if (inputEquation.get(i).getCharValue() == '(' && inputEquation.get(i - 1).getCharValue() == ')') {
				inputEquation.add(i, new Variable('*'));
			} else if (inputEquation.get(i).getCharValue() == '(' && Character.isLetter(inputEquation.get(i - 1).getCharValue())) {
				inputEquation.add(i, new Variable('*'));
			} else if (inputEquation.get(i - 1).getCharValue() == ')' && Character.isLetter(inputEquation.get(i).getCharValue())) {
				inputEquation.add(i, new Variable('*'));
			}
		}
	}
	
	public static boolean isParsable(String input) {
		
		for (int i = 0; i < input.length(); i++) {
			for (int j = 0; j < acceptedNonADNumbers.length; j++) {
				if (!(input.charAt(i) == '+' || input.charAt(i) == '!' || input.charAt(i) == '*' || input.charAt(i) == '(' || input.charAt(i) == ')' || Character.isAlphabetic(input.charAt(i)) || Character.isDigit(input.charAt(i)))) {
					return false;
				}
			}
		}
		return true;
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -

//- - - OPERATE - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public EquationList<Variable> operate(EquationList<Variable> inputEquation) {
		
		EquationList<Variable> returnValue = inputEquation;								
		while (hasOperator(returnValue, '*')) {
			multiply(returnValue);
		}								
		while(hasOperator(returnValue, '+')) {
			add(returnValue);								
		}
		return returnValue;
	}
	
	private void multiply(EquationList<Variable> inputEquation) {
		Variable tempVariable;
		for (int i = 0; i < inputEquation.size(); i++) {
			if (inputEquation.get(i).getCharValue() == '*') {
				int product;
				if (inputEquation.get(i - 1).getBitValue() == 0 || inputEquation.get(i + 1).getBitValue() == 0) {
					product = 0;
				} else {
					product = 1;
				}
				inputEquation.removeRange((i - 1), (i + 2));
				tempVariable = new Variable(product);
				inputEquation.add(i - 1, tempVariable);
			}
		}
	}
	
	private void add(EquationList<Variable> inputEquation) {
		Variable tempVariable;
		for (int i = 0; i < inputEquation.size(); i++) {
			if (inputEquation.get(i).getCharValue() == '+') {
				int sum = 3;
				if (inputEquation.get(i - 1).getBitValue() == 0 && inputEquation.get(i + 1).getBitValue() == 0) {
					sum = 0;
				} else {
					sum = 1;
				}
				inputEquation.removeRange((i - 1), (i + 2));
				tempVariable = new Variable(sum);
				inputEquation.add(i - 1, tempVariable);
			}
		}
	}
	
	public boolean hasOperator(EquationList<Variable> insideEquation, char inputChar) {
		
		for (int i = 0; i < insideEquation.size(); i++) {
			if (insideEquation.get(i).getCharValue() == inputChar) {
				return true;
			}
		} 
		return false;
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -
	
//- - - SOLVE - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public int solve(String inputVariables) {
		
		String insideInputs = inputVariables;
		@SuppressWarnings("unchecked")
		EquationList<Variable> insideEquation = (EquationList<Variable>) currentEquation.clone();
		setVariableBitValues(insideInputs);
		setEquationBitValues(insideEquation);
		while (hasParentheses(insideEquation)) {
			insideEquation = solveParentheses(insideEquation);
		}
		insideEquation = operate(insideEquation);
		if (insideEquation.get(0).getBitValue() == 1) {
			minterms.add(insideInputs);
		} else {
			maxterms.add(insideInputs);
		}
		return insideEquation.get(0).getBitValue();
		
	}
	
	private void setVariableBitValues(String input) {
		Integer inputInt;
		for (int i = 0; i < knownVariables.size(); i++) {
			inputInt = new Integer(Integer.parseInt(Character.toString(input.charAt(i))));	
			knownVariables.get(i).setBitValue(inputInt);
		}
	}
	
	private void setEquationBitValues(EquationList<Variable> insideEquation) {
		for (int i = 0; i < insideEquation.size(); i++) {
			for (int j = 0; j < knownVariables.size(); j++) {
				
				if (insideEquation.get(i).getCharValue() == knownVariables.get(j).getCharValue()) {
					if (insideEquation.get(i).isInverted()) {
						insideEquation.get(i).setBitValue(knownVariables.get(j).getInverted());
					} else {
						insideEquation.get(i).setBitValue(knownVariables.get(j).getBitValue());
					}
				}
			}
		}
	}
	
	public String binaryValue(int iteration) {
		
		String returnValue = Integer.toBinaryString(iteration);
		while (returnValue.length() < knownVariables.size()) {
			returnValue = "0" + returnValue;
		}
		return returnValue;
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -
	
//- - - PARENTHESES - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private EquationList<Variable> solveParentheses(EquationList<Variable> insideEquation) {
		
		int[] smallParentheses = smallestParentheses(insideEquation);
		@SuppressWarnings("unchecked") EquationList<Variable> returnArray = (EquationList<Variable>) insideEquation.clone();
		EquationList<Variable> equateableValues = returnArray.subList(smallParentheses[0] + 1, smallParentheses[1]);
		equateableValues = operate(equateableValues);
		returnArray.removeRange(smallParentheses[0], (smallParentheses[1] + 1));
		for (int i = 0; i < equateableValues.size(); i++) {
			returnArray.add((smallParentheses[0]), equateableValues.get(i));
		}		
		return returnArray;
	}
	
	private int[] smallestParentheses(EquationList<Variable> insideEquation) {
		
		int[] returnParentheses = {-1, -1};
		int maxLevel = 0;
		int level = 0;
		for (int i=0;i<insideEquation.size();i++) {
			if (insideEquation.get(i).getCharValue() == '(') {
				level++;
				if (returnParentheses[0] == -1) {
					returnParentheses[0] = i;
				} else {
					if (level > maxLevel) {
						returnParentheses[0] = i;
					}
				}
			} else if (insideEquation.get(i).getCharValue() == ')') {
				if (returnParentheses[1] == -1) {
					returnParentheses[1] = i;
					maxLevel = level;
					level = 0;
				} else if (level > maxLevel) {
					returnParentheses[1] = i;
					maxLevel = level;
					level = 0;
				}
			}
		}
		return returnParentheses;
	}
	
	private boolean hasParentheses(EquationList<Variable> insideEquation) {
		
		for (int i=0;i<insideEquation.size();i++) {
			if (insideEquation.get(i).getCharValue() == '(' || insideEquation.get(i).getCharValue() == ')') {
				return true;
			}
		}
		return false;
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -
	
//- - - CONONICAL EQUATIONS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public String canonicalSOP() {
		
		String returnString = "";
		for (int i = 0; i < minterms.size(); i++) {
			for (int j = 0; j < knownVariables.size(); j++) {
				if (minterms.get(i).charAt(j) == '0') {
					returnString += knownVariables.get(j).getCharValue();
				} else {
					returnString += knownVariables.get(j).getCharValue() + "!";
				}
			}
			if (!(i == minterms.size() - 1)) {
				returnString += "+";
			}
		}
		return returnString;
	}
	
	public String canonicalPOS() {
		
		String returnString = "";
		for (int i = 0; i < maxterms.size(); i++) {
			returnString += "(";
			for (int j = 0; j < knownVariables.size(); j++) {
				if (maxterms.get(i).charAt(j) == '1') {
					if (j == knownVariables.size() - 1) {
						returnString += knownVariables.get(j).getCharValue();
					} else {
						returnString += knownVariables.get(j).getCharValue() + "+";
					}
				} else {
					if (j == knownVariables.size() - 1) {
						returnString += knownVariables.get(j).getCharValue() + "!";
					} else {
						returnString += knownVariables.get(j).getCharValue() + "!" + "+";
					}				}
			}
			returnString += ")";
		}
		return returnString;
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -
}
