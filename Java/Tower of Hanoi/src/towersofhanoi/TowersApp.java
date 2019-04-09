package towersofhanoi;

public class TowersApp {
	public static void main(String[] args)
	{	
		DrawTowers GUI = new DrawTowers();
		
		GameState gs = new GameState(GUI);
		
		GUI.setGameState(gs);
		
		GUI.setVisible(true);
	}
}
