package towersofhanoi;

import java.awt.Color;
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

@SuppressWarnings("serial")
public class DrawTowers extends JFrame implements ActionListener {

	GameState gameState;

	int diskNumber, movesCount, solutionIndex, fewestMoves;
	ArrayList<String> solutions;

	JPanel pnlMain;
	JLabel lblDisks, lblTitle, lblWinner, lblTryAgain, lblMoves, lblMovesCount;
	JButton btnReset, btnPlus, btnMinus, btnStart, btnNewDisks, btnSolve,
			btnRules;
	JButton[] btnMove = new JButton[3];
	MyPanel myPanel;

	public DrawTowers() {
		gameState = null;
		initUI();
	}

	private void initUI() {
		myPanel = new MyPanel();
		getContentPane().add(myPanel);

		btnReset = new JButton("Скинути");
		btnReset.addActionListener(this);
		btnReset.setEnabled(false);
		btnReset.setBounds(480, 11, 89, 23);
		myPanel.add(btnReset);

		btnMove[2] = new JButton("Хід 3");
		btnMove[2].addActionListener(this);
		btnMove[2].setEnabled(false);
		btnMove[2].setBounds(430, 288, 145, 23);
		myPanel.add(btnMove[2]);

		btnMove[1] = new JButton("Хід 2");
		btnMove[1].addActionListener(this);
		btnMove[1].setEnabled(false);
		btnMove[1].setBounds(230, 288, 145, 23);
		myPanel.add(btnMove[1]);

		btnMove[0] = new JButton("Хід 1");
		btnMove[0].addActionListener(this);
		btnMove[0].setEnabled(false);
		btnMove[0].setBounds(30, 288, 145, 23);
		myPanel.add(btnMove[0]);

		lblDisks = new JLabel("Дисків: 1");
		lblDisks.setFont(new Font("Tahoma", Font.PLAIN, 16));
		lblDisks.setBounds(10, 364, 80, 14);
		myPanel.add(lblDisks);

		btnPlus = new JButton("+");
		btnPlus.addActionListener(this);
		btnPlus.setBounds(98, 350, 41, 20);
		myPanel.add(btnPlus);

		btnMinus = new JButton("-");
		btnMinus.addActionListener(this);
		btnMinus.setBounds(98, 375, 41, 20);
		myPanel.add(btnMinus);

		lblTitle = new JLabel("Ханойські вежі");
		lblTitle.setForeground(new Color(255, 255, 153));
		lblTitle.setFont(new Font("Comic Sans MS", Font.PLAIN, 30));
		lblTitle.setBounds(10, 11, 240, 31);
		myPanel.add(lblTitle);

		btnStart = new JButton("Почати");
		btnStart.addActionListener(this);
		btnStart.setBounds(260, 11, 89, 23);
		myPanel.add(btnStart);


		lblWinner = new JLabel(
				"Ви вирішили за n кроків! Найшвидше рішення займає n ходів.");
		lblWinner.setForeground(new Color(153, 0, 102));
		lblWinner.setFont(new Font("Comic Sans MS", Font.PLAIN, 16));
		lblWinner.setVisible(false);
		lblWinner.setBounds(87, 45, 497, 23);
		myPanel.add(lblWinner);

		btnNewDisks = new JButton("Нові диски");
		btnNewDisks.addActionListener(this);
		btnNewDisks.setEnabled(false);
		btnNewDisks.setBounds(361, 11, 108, 23);
		myPanel.add(btnNewDisks);

		lblTryAgain = new JLabel("Спробуй ще раз за меншу кількість ходів!");
		lblTryAgain.setForeground(new Color(153, 0, 102));
		lblTryAgain.setFont(new Font("Comic Sans MS", Font.PLAIN, 16));
		lblTryAgain.setBounds(145, 63, 320, 23);
		lblTryAgain.setVisible(false);
		myPanel.add(lblTryAgain);

		lblMoves = new JLabel("Ходів: ");
		lblMoves.setFont(new Font("Tahoma", Font.PLAIN, 16));
		lblMoves.setBounds(175, 353, 65, 23);
		myPanel.add(lblMoves);

		movesCount = 0;
		fewestMoves = 0;
		lblMovesCount = new JLabel("" + movesCount);
		lblMovesCount.setFont(new Font("Tahoma", Font.PLAIN, 16));
		lblMovesCount.setBounds(232, 353, 29, 23);
		myPanel.add(lblMovesCount);

		btnSolve = new JButton("Показати рішення");
		btnSolve.addActionListener(this);
		btnSolve.setBounds(342, 329, 230, 37);
		btnSolve.setEnabled(false);
		myPanel.add(btnSolve);

		btnRules = new JButton("Як грати");
		btnRules.addActionListener(this);
		btnRules.setBounds(342, 375, 230, 37);
		myPanel.add(btnRules);

		setTitle("Ханойські вежі");
		setSize(600, 450);
		setResizable(false);
		setLocationRelativeTo(null);
		setDefaultCloseOperation(EXIT_ON_CLOSE);
	}


	@Override
	public void actionPerformed(ActionEvent e) {
		JButton temp = (JButton) e.getSource();
		String buttonText = temp.getText();

		gameState.buttonClick(buttonText);
		diskNumber = getNumberOfDisks();
		if (buttonText == "+") {
			if (diskNumber < 6)
				diskNumber++;
			lblDisks.setText("Дисків: " + diskNumber);
		} else if (buttonText == "-") {
			if (diskNumber > 1)
				diskNumber--;
			lblDisks.setText("Дисків: " + diskNumber);
		} else if (buttonText == "Почати") {
			movesCount = 0;
			lblMovesCount.setText("0");
			btnSolve.setEnabled(true);
			btnSolve.setText("Показати рішення");
			btnNewDisks.setEnabled(true);
			btnStart.setEnabled(false);
			btnPlus.setEnabled(false);
			btnMinus.setEnabled(false);
			btnMove[0].setEnabled(true);
			btnMove[1].setEnabled(true);
			btnMove[2].setEnabled(true);
			btnReset.setEnabled(true);

			addMovesToButtons(gameState.possibleMoves);
                        
			myPanel.setPole(1, gameState.pole1);
			myPanel.setPole(2, gameState.pole2);
			myPanel.setPole(3, gameState.pole3);
			myPanel.repaint();
		} else if (buttonText.contains("Перемістити")) {
			movesCount++;
			updateMovesCount();

			if (buttonText.contains("стрижня")) {
				solutionIndex++;
				if (solutionIndex < solutions.size())
					btnSolve.setText(solutions.get(solutionIndex));
			} else {
				addMovesToButtons(gameState.possibleMoves);
			}

			myPanel.setPole(1, gameState.pole1);
			myPanel.setPole(2, gameState.pole2);
			myPanel.setPole(3, gameState.pole3);
			myPanel.repaint();

			if (gameState.solvedCheck()) {
				resetAllMoveButtons(false);

				setlblWinner();
				lblWinner.setVisible(true);
				if (movesCount != fewestMoves)
					lblTryAgain.setVisible(true);
				btnSolve.setEnabled(false);
				btnSolve.setText("Показати рішення");
				movesCount = 0;
				lblMovesCount.setText("0");
			}
		} else if (buttonText == "Скинути") {
			movesCount = 0;
			lblMovesCount.setText("0");
			btnSolve.setText("Показати рішення");
			btnSolve.setEnabled(true);
			lblWinner.setVisible(false);
			lblTryAgain.setVisible(false);

			addMovesToButtons(gameState.possibleMoves);
                        
			myPanel.setPole(1, gameState.pole1);
			myPanel.setPole(2, gameState.pole2);
			myPanel.setPole(3, gameState.pole3);
			myPanel.repaint();
		} else if (buttonText == "Нові диски") {
			lblWinner.setVisible(false);
			lblTryAgain.setVisible(false);
			btnSolve.setText("Показати рішення");
			btnSolve.setEnabled(false);
			btnStart.setEnabled(true);
			btnReset.setEnabled(false);
			resetAllMoveButtons(false);
			btnPlus.setEnabled(true);
			btnMinus.setEnabled(true);

			myPanel.setPole(1, gameState.pole1);
			myPanel.setPole(2, gameState.pole2);
			myPanel.setPole(3, gameState.pole3);
			myPanel.repaint();
		} else if (buttonText == "Показати рішення") {
			movesCount = 0;
			lblMovesCount.setText("0");

			myPanel.setPole(1, gameState.pole1);
			myPanel.setPole(2, gameState.pole2);
			myPanel.setPole(3, gameState.pole3);
			myPanel.repaint();

			solutionIndex = 0;
			setAllMoveButtons(false, "-");
                        
			solutions = gameState.getSolutions();
			btnSolve.setText(solutions.get(solutionIndex));
		} else if (buttonText == "Як грати") {
			HowToPlay htp = new HowToPlay();
			htp.setVisible(true);
		}

	}

	public void resetAllMoveButtons(boolean state) {
		for (int i = 0; i < btnMove.length; i++) {
			btnMove[i].setText("Хід " + (i + 1));
			btnMove[i].setEnabled(state);
		}
	}

	public void setAllMoveButtons(boolean state, String text) {
		for (int i = 0; i < btnMove.length; i++) {
			btnMove[i].setText(text);
			btnMove[i].setEnabled(state);
		}
	}

	public void updateMovesCount() {
		lblMovesCount.setText("" + movesCount);
	}

	public void setlblWinner() {
		fewestMoves = (int) (Math.pow(2, diskNumber) - 1);
		lblWinner
				.setText("Ви вирішили за " + lblMovesCount.getText()
						+ " ходів! Найшвидше рішення займає " + fewestMoves
						+ " ходів.");
                
	}

	public void addMovesToButtons(ArrayList<String> moves) {
		resetAllMoveButtons(true);

		if (moves.isEmpty() || moves.size() > 3) {
			System.out
					.println("Не існує можливих ходів або ходів занадто багато, не достатньо кнопок.");
		} else if (moves.size() == 3) {
			for (int i = 0; i < moves.size(); i++)
				btnMove[i].setText(moves.get(i));
		} else {
			for (int i = 0; i < moves.size(); i++)
				btnMove[i].setText(moves.get(i));

			for (int i = moves.size(); i < 3; i++) {
				btnMove[i].setText("-");
				btnMove[i].setEnabled(false);
			}
		}
	}

	public int getNumberOfDisks() {
		char diskNumChar = lblDisks.getText().charAt(
				lblDisks.getText().length() - 1);
		return Character.getNumericValue(diskNumChar);
	}

	public void setGameState(GameState gs) {
		gameState = gs;
	}
}
