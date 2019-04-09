package booleancalculator;

public class Variable {
	
//- - - INSTANCE VARIABLE - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private Character charValue;
	private int bitValue;
	private boolean isInverted;
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -
	
//- - - CONSTRUCTORS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public Variable(char value, int nBit, boolean is) {
		charValue = value;
		bitValue = nBit;
		isInverted = is;
	}
	
	public Variable(int nBit) {
		charValue = Integer.toString(nBit).charAt(0);
		isInverted = false;
		bitValue = nBit;
	}
	
	public Variable(char charV) {
		charValue = charV;
		bitValue = -1;
		isInverted = false;
	}
	
	public Variable(Character value, boolean inverted) {
		charValue = value;
		isInverted = inverted;
		bitValue = 0;
	}
	
	public Variable(Variable addedValue) {
		charValue = addedValue.getCharValue();
		bitValue = addedValue.getBitValue();
		isInverted = addedValue.isInverted();
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -
	
//- - - GETTER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public Character getCharValue() {
		return charValue;
	}
	
	public int getBitValue() {
		return bitValue;
	}
	
	public boolean isInverted() {
		return isInverted;
	}
	
	public int getInverted() {
		int returnBit;
		if (bitValue == 0) {
			returnBit = 1;
		} else {
			returnBit = 0;
		}
		return returnBit;
	}
	
	public String toString() {
		
		return "" + charValue + bitValue + Boolean.toString(isInverted).charAt(0);
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -
	
//- - - SETTER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public void setBitValue(int bit) {
		this.bitValue = bit;
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -
}
