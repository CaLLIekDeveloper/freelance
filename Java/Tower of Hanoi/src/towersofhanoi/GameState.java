package towersofhanoi;

import java.awt.Color;
import java.util.ArrayList;

public class GameState {	
	DrawTowers GUI;
	
	int numberOfBlocks, from, to;
	final int MAX_BLOCKS = 6;
	
	ArrayList<Block> pole1;
	ArrayList<Block> pole2;
	ArrayList<Block> pole3;
	
	ArrayList<String> solutions;
	ArrayList<String> possibleMoves;

	Block [] block = new Block[MAX_BLOCKS];
	
	public GameState(DrawTowers gui)
	{
		GUI = gui;
		numberOfBlocks = 1;
		
		pole1 = new ArrayList<Block>();
		pole2 = new ArrayList<Block>();
		pole3 = new ArrayList<Block>();
		solutions = new ArrayList<String>();
		possibleMoves = new ArrayList<String>();
		
		block[5] = new Block(160, new Color(233,104,134));
		block[4] = new Block(140, new Color(90,169,222));
		block[3] = new Block(120, new Color(165,250,245));
		block[2] = new Block(100, new Color(217,139,255));
		block[1] = new Block(80, new Color(255,230,168));
		block[0] = new Block(60, new Color(246,215,62));
	}
	
	public void buttonClick(String buttonText)
	{
		if(buttonText == "Почати")
		{
			int pole1Blocks = GUI.getNumberOfDisks();
			for(int i = pole1Blocks-1; i >= 0; i--)
				pole1.add(block[i]);
			
			getPossibleMoves();
		}
		else if(buttonText.contains("Перемістити"))
		{
			if(buttonText.contains("стрижня"))
			{
				from = Character.getNumericValue(buttonText.charAt(14));
				to = Character.getNumericValue(buttonText.charAt(27));
			}
			else{
				from = Character.getNumericValue(buttonText.charAt(12));
				to = Character.getNumericValue(buttonText.charAt(17));
			}
			moveDisk(from, to);
			getPossibleMoves();
		}
		else if(buttonText == "Скинути")
		{
			buttonClick("Нові диски");
			buttonClick("Почати");
		}
		else if(buttonText == "Нові диски")
		{
			pole1.clear();
			pole2.clear();
			pole3.clear();
		}
		else if(buttonText == "Показати рішення")
		{
			buttonClick("Скинути");
		}
		
	}

	public void getPossibleMoves() {
		possibleMoves.clear();
		
		if(!pole1.isEmpty())
		{
			if(pole2.isEmpty() || pole1.get(pole1.size()-1).getWidth()  <  pole2.get(pole2.size()-1).getWidth())
				possibleMoves.add("Перемістити 1 до 2");	
			if(pole3.isEmpty() || pole1.get(pole1.size()-1).getWidth()  <  pole3.get(pole3.size()-1).getWidth())
				possibleMoves.add("Перемістити 1 до 3");
		}

		if(!pole2.isEmpty())
		{
			if(pole1.isEmpty() || pole2.get(pole2.size()-1).getWidth()  <  pole1.get(pole1.size()-1).getWidth())
				possibleMoves.add("Перемістити 2 до 1");	
			if(pole3.isEmpty() || pole2.get(pole2.size()-1).getWidth()  <  pole3.get(pole3.size()-1).getWidth())
				possibleMoves.add("Перемістити 2 до 3");
		}
		if(!pole3.isEmpty())
		{
			if(pole1.isEmpty() || pole3.get(pole3.size()-1).getWidth()  <  pole1.get(pole1.size()-1).getWidth())
				possibleMoves.add("Перемістити 3 до 1");	
			if(pole2.isEmpty() || pole3.get(pole3.size()-1).getWidth()  <  pole2.get(pole2.size()-1).getWidth())
				possibleMoves.add("Перемістити 3 до 2");
		}
	}
	
	public void moveDisk(int p1, int p2){
		if(p1 == 1 && p2 == 2){
			pole2.add(pole1.get(pole1.size()-1));
			pole1.remove(pole1.size()-1);
		}
		else if(p1 == 1 && p2 == 3){
			pole3.add(pole1.get(pole1.size()-1));
			pole1.remove(pole1.size()-1);
		}
		else if(p1 == 2 && p2 == 1){
			pole1.add(pole2.get(pole2.size()-1));
			pole2.remove(pole2.size()-1);
		}
		else if(p1 == 2 && p2 == 3){
			pole3.add(pole2.get(pole2.size()-1));
			pole2.remove(pole2.size()-1);
		}
		if(p1 == 3 && p2 == 1){
			pole1.add(pole3.get(pole3.size()-1));
			pole3.remove(pole3.size()-1);
		}
		if(p1 == 3 && p2 == 2){
			pole2.add(pole3.get(pole3.size()-1));
			pole3.remove(pole3.size()-1);
		}
	}
	
	public ArrayList<String> getSolutions()
	{
		solutions.clear();
		move( GUI.getNumberOfDisks(), 1, 3, 2);
		return solutions;
	}
	
	public void move(int numberOfDisks, int startPole, int endPole, int usingPole) {
		if (numberOfDisks == 1) {
		  solutions.add("Перемістити з " + startPole + " до стрижня " + endPole);
	    } else {
		  move(numberOfDisks - 1, startPole, usingPole, endPole);
		  move(1, startPole, endPole, usingPole);
		  move(numberOfDisks - 1, usingPole, endPole, startPole);
		 }
	}
	
	public boolean solvedCheck()
	{
		if(pole1.isEmpty() && pole2.isEmpty())
			return true;
		return false;
	}
}
