package towersofhanoi;

import java.awt.Color;
import java.awt.Graphics;
import java.util.ArrayList;
import javax.swing.BorderFactory;
import javax.swing.JPanel;

@SuppressWarnings("serial")
public class MyPanel extends JPanel {

	final int POLE1CENTER = 100;
	final int POLE2CENTER = 300;
	final int POLE3CENTER = 500;
	final int POLEBASE = 250;
	final int POLEWIDTH = 8;
	final int POLEHEIGHT = 165;

	ArrayList<Block> p1;
	ArrayList<Block> p2;
	ArrayList<Block> p3;

	public MyPanel() {

		setBorder(BorderFactory.createLineBorder(Color.black));
		p1 = new ArrayList<Block>();
		p2 = new ArrayList<Block>();
		p3 = new ArrayList<Block>();
		setBackground(new Color(240, 240, 240));
                //114, 226, 126
		setLayout(null);
	}

	public void paintComponent(Graphics g) {
		super.paintComponent(g);
		
		g.setColor(new Color(172, 141, 70));
		g.fillRect(POLE1CENTER - (POLEWIDTH / 2), (POLEBASE - POLEHEIGHT),POLEWIDTH, POLEHEIGHT);
		g.fillRect(POLE2CENTER - (POLEWIDTH / 2), (POLEBASE - POLEHEIGHT),POLEWIDTH, POLEHEIGHT);
		g.fillRect(POLE3CENTER - (POLEWIDTH / 2), (POLEBASE - POLEHEIGHT),POLEWIDTH, POLEHEIGHT);
		g.fillRect(5, POLEBASE, 585, POLEWIDTH);

		drawBlocks(g);
	}

	public void setPole(int n, ArrayList<Block> p) {
		switch (n) {
		case 1:
			p1 = p;
			break;
		case 2:
			p2 = p;
			break;
		case 3:
			p3 = p;
			break;
		}

	}

	public void drawBlocks(Graphics g) {
		if (p1 != null) {
			for (int i = 0; i < p1.size(); i++) {
				g.setColor(p1.get(i).getColor());
				g.fillRect(POLE1CENTER - (p1.get(i).getWidth() / 2), POLEBASE + 2 - (p1.get(i).getHeight() * (i + 1)), (p1.get(i).getWidth()), p1.get(i).getHeight());
			}
		}
		if (p2 != null) {
			for (int i = 0; i < p2.size(); i++) {
				g.setColor(p2.get(i).getColor());
				g.fillRect(POLE2CENTER - (p2.get(i).getWidth() / 2), POLEBASE + 2 - (p2.get(i).getHeight() * (i + 1)), (p2.get(i).getWidth()), p2.get(i).getHeight());
			}
		}
		if (p3 != null) {
			for (int i = 0; i < p3.size(); i++) {
				g.setColor(p3.get(i).getColor());
				g.fillRect(POLE3CENTER - (p3.get(i).getWidth() / 2), POLEBASE + 2 - (p3.get(i).getHeight() * (i + 1)), (p3.get(i).getWidth()), p3.get(i).getHeight());
			}
		}
	}

}
