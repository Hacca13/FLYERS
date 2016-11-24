package beans;

public class TagBean {
	
	private String nome;
	private int keyTag;
	
		
	public TagBean(int keyTag, String nome){
		this.keyTag = keyTag;
		this.nome = nome;
	}

	
	public int getKeyTag(){
		return keyTag;
	}
	
	public void setKeyTag(int keyTag){
		this.keyTag = keyTag;
	}

	public String getNome() {
		return nome;
	}


	public void setNome(String nome) {
		this.nome = nome;
	}
	
	
	public String toString(){
		return getClass().getName()+"[keyTag="+keyTag+" nome="+nome+"]";
	}
	
}
