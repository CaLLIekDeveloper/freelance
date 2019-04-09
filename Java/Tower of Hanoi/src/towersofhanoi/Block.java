package towersofhanoi;

import java.awt.Color;

public class Block {

	final int HEIGHT = 25;

	int width;
	Color color;

	public Block() {
		this(0, null);
	}

	public Block(int w, Color c) {
		width = w;
		color = c;
	}

	public int getHeight() {
		return HEIGHT;
	}

	public int getWidth() {
		return width;
	}

	public Color getColor() {
		return color;
	}
}
