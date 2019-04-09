package booleancalculator;

public class DisplayDriver {
	static WholeFrame frame;
	public static void main(String[] args) {
		
		frame = new WholeFrame();
		frame.setTitle("Таблиця істинності");
                frame.setLocationRelativeTo(null);
		frame.setVisible(false);
	}
        
        public static void Exit()
        {
            frame.dispose();
        }
        
        public static void answer()
        {
            frame.Command();
        }
}
