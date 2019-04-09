package booleancalculator;

import java.util.*;

public class EquationList<E> extends ArrayList<E> {

	public void removeRange(int fromIndex, int toIndex) {
		super.removeRange(fromIndex, toIndex);
	}

	public EquationList<E> subList(int fromIndex, int toIndex) {
		List<E> returnedList = super.subList(fromIndex, toIndex);
		EquationList<E> returnEquation = new EquationList<E>();
		for (int i = 0; i < returnedList.size(); i++) {
			returnEquation.add(returnedList.get(i));
		}
		return returnEquation;
	}
}
