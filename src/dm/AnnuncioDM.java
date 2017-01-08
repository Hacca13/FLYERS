package dm;

import java.util.LinkedList;
import java.util.List;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import beans.AnnuncioBean;
import beans.TagBean;
import jdbc.DriverManagerConnectionPool;

public class AnnuncioDM {
	
	private final static String TABLE_ANNUNCIO="ANNUNCIO(TITOLO, DESCRIZIONE, CONTATTO, DATADICARICAMENTO, KEYUTENTE)";
	private final static String TABLE_TAG="TAG(NOME)";
	private final static String TABLE_TAGPERANNUNCIO="TAGPERANNUNCIO(KEYTAG, KEYANNUNCIO)";
	
	
	public synchronized void createAnnuncio(AnnuncioBean annuncioBean, List<TagBean> colTags ) throws SQLException
	{
		Connection connection=null;
		PreparedStatement prepareteStatement =null;
		
		String sqlForAnnuncio="INSERT INTO"+TABLE_ANNUNCIO+"VALUES(?,?,?,?,?)";
		
		String sqlForTagPerAnnuncio= "INSERT INTO"+TABLE_TAGPERANNUNCIO+"Values(?,?)";
		
		
		try {
			
			connection = DriverManagerConnectionPool.getConnection();
			prepareteStatement =connection.prepareStatement(sqlForAnnuncio);
			prepareteStatement.setString(1, annuncioBean.getTitolo());
			prepareteStatement.setString(2, annuncioBean.getDescrizione());
			prepareteStatement.setString(3, annuncioBean.getContatto());
			prepareteStatement.setDate(4, annuncioBean.getDataDiCaricamento());
			prepareteStatement.setInt(5, annuncioBean.getKeyUtente());
			prepareteStatement.executeUpdate();
			
			connection.commit();
			
			
			
		}finally {
			if(connection !=null){
				try{
					connection.close();	
				}finally {
				DriverManagerConnectionPool.releaseConnection(connection);
				}
			}		
		}
		
		// Aggiungo i tag che non esistono alla tabbella TAG
		TagDM tagDM = new TagDM();
		for (int i =0 ; i<colTags.size(); i++ ){
			TagBean t = colTags.get(i);
				if(tagDM.existsTag(t.getNome())==false){
					tagDM.insertUser(t);		
				}
		}
			
		
		//ultima chiave;
		String sqlUltimaKey ="LAST(KEYANNUNCIO) FROM ANNUNCIO";
		ResultSet rs =null;
		try {
			connection = DriverManagerConnectionPool.getConnection();
			prepareteStatement =connection.prepareStatement(sqlUltimaKey);
			 int i=PreparedStatement.RETURN_GENERATED_KEYS;
			
			
		}finally {
			if(connection !=null){
				try{
					connection.close();	
				}finally {
					DriverManagerConnectionPool.releaseConnection(connection);
				}
			}		
		}	
		
		
		
		
		
		
		
		
		
		//Aggiungo i riferimenti alla tabella TAGPERANNUNCIO
		for (int i =0 ; i<colTags.size(); i++ ){
			TagBean t = colTags.get(i);
			TagBean t2= tagDM.searchTag(t.getNome());
			
			try {
				connection = DriverManagerConnectionPool.getConnection();
				prepareteStatement =connection.prepareStatement(sqlForTagPerAnnuncio);
				prepareteStatement.setInt(1, t2.getKeyTag());
				
				prepareteStatement.executeUpdate();	
			}finally {
				if(connection !=null){
					try{
						connection.close();	
					}finally {
						DriverManagerConnectionPool.releaseConnection(connection);
					}
				}		
			}	
		}
		
		
		
		
		
		
		
	}	
	
	
	public synchronized List<AnnuncioBean> searchAnnuncio(String titolo) throws SQLException {
		
		AnnuncioBean annuncioBean;
		LinkedList<AnnuncioBean> lista= new LinkedList<AnnuncioBean>();
		
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		ResultSet rs = null;
		String searchAnnuncioSQL = "SELECT * FROM "+TABLE_ANNUNCIO+ " WHERE TITOLO= ? ";
		
		
		
		try{
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(searchAnnuncioSQL);
			preparedStatement.setString(1, titolo);
			rs = preparedStatement.executeQuery();
			
			while(rs.next()){
				annuncioBean=new AnnuncioBean();
				annuncioBean.setKeyAnnuncio(rs.getInt("KEYANNUNCIO"));
				annuncioBean.setTitolo(rs.getString("TITOLO"));
				annuncioBean.setDescrizione(rs.getString("DESCRIZIONE"));
				annuncioBean.setContatto(rs.getString("CONTATTO"));
				annuncioBean.setDataDiCaricamento(rs.getDate("DATADICARICAMENTO"));
				annuncioBean.setKeyUtente(rs.getInt("KEYUTENTE"));
				annuncioBean.setTagsOfAnnuncio(searchTagPerAnnuncio(rs.getInt("KEYANNUNCIO")));
			
				lista.add(annuncioBean);
			}	
		}finally {
			try{
				if(connection!=null){
					connection.close();
				}
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}	
		}
		
		return lista;
		}
	
	
	private synchronized List<TagBean> searchTagPerAnnuncio (int keyAnnuncio) throws SQLException {
		
		LinkedList<TagBean> listaTag=new LinkedList<TagBean>();
		
		TagBean tag;
		TagDM tagDM=new TagDM();
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		ResultSet rs = null;
		String seachTagPerAnnuncio="SELECT * FROM "+TABLE_TAGPERANNUNCIO+ " WHERE KEYANNUNCIO= ? ";
	
		
		try{
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(seachTagPerAnnuncio);
			preparedStatement.setInt(1, keyAnnuncio);
			rs = preparedStatement.executeQuery();
			
			while(rs.next()){
				tag= tagDM.searchTag(rs.getInt("KEYTAG"));
				
				listaTag.add(tag);
			}
		}finally {
			try{
				if(connection!=null){
					connection.close();
				}
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}	
		}		
		
		return listaTag;
		
	}
	
	public synchronized boolean deleteAnnuncio(int keyAnnuncio) throws SQLException {
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		int rs = 0;
		String deleteAnnuncio="DELETE FROM "+TABLE_ANNUNCIO+ " WHERE KEYANNUNCIO= ? ";
		
		try{
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement=connection.prepareStatement(deleteAnnuncio);
			preparedStatement.setInt(1, keyAnnuncio);
			// elimino anche i riferimenti nella tabella TAGPERANNUNCIO
			deleteTagPerAnnuncio(keyAnnuncio);
			
			rs=preparedStatement.executeUpdate();
			
			connection.commit();
		} finally {
			try{
				if(connection!=null){
					connection.close();
				}
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}	
		}
		
		return (rs!=0);
	}		
	
	
	private synchronized boolean deleteTagPerAnnuncio (int keyAnnuncio) throws SQLException {
		
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		int rs = 0;
		String deleteTagPerAnnuncio="DELETE * FROM "+TABLE_TAGPERANNUNCIO+ " WHERE KEYANNUNCIO= ? ";
		
		try{
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement=connection.prepareStatement(deleteTagPerAnnuncio);
			preparedStatement.setInt(1, keyAnnuncio);
			rs=preparedStatement.executeUpdate();
			connection.commit();
			
		}finally {
			try{
				if(connection!=null){
					connection.close();
				}
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}
		}
		
		return (rs!=0);
	}
	
	
	
	public synchronized void updateAnnuncio(int key) throws SQLException {}
	
	
	public synchronized void searchAnnuncio(TagBean tag) throws SQLException {}
	public synchronized void deleteAnnuncio(TagBean tag) throws SQLException {}
	public synchronized void updateAnnuncio(TagBean tag) throws SQLException {}
	
	
	
	
	
	
}
