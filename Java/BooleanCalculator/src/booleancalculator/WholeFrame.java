package booleancalculator;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class WholeFrame extends JFrame {
	
//- - - INSTANCE UI VARIABLES - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private final int APPLET_WIDTH, APPLET_HEIGHT;
	private JPanel equationPanel, inputPanel, truthTablePanel;
	private JTLabel equationLabel;
	private JTextField equationText;
	private ActionListener listener;
	private int gridRows, gridColumns;	
	private Equation currentEquation;
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -
	
//- - - CONSTRUCTOR - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	public WholeFrame() {

		getContentPane().setBackground(Color.red);
		APPLET_WIDTH = 600;
		APPLET_HEIGHT = 800;
		equationPanel = createEquationPanel();
		currentEquation = new Equation(equationText.getText());
		truthTablePanel = createTruthTablePanel(currentEquation);
		add(equationPanel, BorderLayout.NORTH);
		add(truthTablePanel, BorderLayout.CENTER);
		setSize(APPLET_WIDTH, APPLET_HEIGHT);
		
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -	
        public void Command()
        {
            equationText.setText(formCalc.text);
            String temp = formCalc.text;
            temp = temp.replace("∨", "+");
            temp = temp.replace("∧", "*");
			if (Equation.isParsable(temp)) {
				currentEquation = new Equation(temp);
				remove(truthTablePanel);
				truthTablePanel = new JPanel();
				truthTablePanel = createTruthTablePanel(currentEquation);
				add(truthTablePanel, BorderLayout.CENTER);
				equationLabel.setForeground(Color.black);
				equationLabel.setText("Вираз: ");
				revalidate();
				repaint();
			} else {
				equationLabel.setForeground(Color.red);
				equationLabel.setText("Неможливо розпарсити строку");
			}
        }
	
//- - - UI PANELS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private JPanel createEquationPanel() {
		JPanel returnPanel = new JPanel(new BorderLayout());
		inputPanel = new JPanel(new GridLayout(2, 1));
		//inputPanel.setBackground(new Color(194, 200, 199));
		//returnPanel.setBackground(new Color(194, 200, 199));
		equationLabel = new JTLabel("Вираз: ", new Color(240,240,240), Color.black);
		equationText = new JTextField("a!+b+ab!");
                equationText.setEnabled(false);
                //"a'b+ab'"
		inputPanel.add(equationLabel);
		inputPanel.add(equationText);
		listener = new ButtonListener();
		returnPanel.add(inputPanel, BorderLayout.CENTER);
		return returnPanel;
	}
	
	private JPanel createTruthTablePanel(Equation inputEquation) {

		gridColumns = inputEquation.getVariableNumber() + 1;
		gridRows = (int) Math.pow(2, inputEquation.getVariableNumber()) + 1;	
		JPanel returnPanel = new JPanel(new GridLayout(gridRows, gridColumns));
		//returnPanel.setBackground(new Color(237, 233, 218));	
		for (int i = 0; i < inputEquation.getVariableNumber(); i++) {
			
			returnPanel.add(new JTLabel(inputEquation.getVariables().get(i).getCharValue().toString(), new Color(95, 125, 144), Color.white));
		}
		returnPanel.add(new JTLabel("Відповідь", new Color(95, 125, 144), Color.white));
		for (int i = 0; i < (int) Math.pow(2, inputEquation.getVariableNumber()); i++) {
			
			String binaryValueRow = currentEquation.binaryValue(i);
			for (int j = 0; j < inputEquation.getVariableNumber(); j++) {
				
				returnPanel.add(new JTLabel(Character.toString(binaryValueRow.charAt(j)), new Color(226, 238, 241), Color.black));
			}
			returnPanel.add(new JTLabel(Integer.toString(currentEquation.solve(binaryValueRow)), new Color(211, 209, 249), Color.black));
		}
		return returnPanel;
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -
	
//- - - LISTENERS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	private class ButtonListener implements ActionListener {
		public void actionPerformed(ActionEvent event) {
                        equationText.setText(formCalc.text);
			if (Equation.isParsable(formCalc.text)) {
				currentEquation = new Equation(formCalc.text);
				remove(truthTablePanel);
				truthTablePanel = new JPanel();
				truthTablePanel = createTruthTablePanel(currentEquation);
				add(truthTablePanel, BorderLayout.CENTER);
				equationLabel.setForeground(Color.black);
				equationLabel.setText("Вираз: ");
				revalidate();
				repaint();
			} else {
				equationLabel.setForeground(Color.red);
				equationLabel.setText("Неможливо розпарсити строку");
			}
		}
	}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - -

}
