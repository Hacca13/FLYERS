package dm;

import java.util.Collection;
import java.util.List;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

import beans.AnnuncioBean;
import beans.TagBean;
import jdbc.DriverManagerConnectionPool;

public class AnnuncioDM {
	
	private final static String TABLE_ANNUNCIO="ANNUNCIO(TITOLO, DESCRIZIONE, CONTATTO, DATADICARICAMENTO, KEYUTENTE)";
	private final static String TABLE_TAG="TAG(KEYTAG, NOME)";
	
	

	public AnnuncioDM(){
		
		
	}
	
	public synchronized void createAnnuncio(AnnuncioBean annuncioBean, List<TagBean> colTags ) throws SQLException
	{
		Connection connection=null;
		PreparedStatement prepareteStatement =null;
		
		String sqlForAnnuncio="INSERT INTO"+TABLE_ANNUNCIO+"VALUES(?,?,?,?,?,?)";
		String sqlForTag= "INSERT INTO"+TABLE_TAG+"Values(?,?)";
		
		
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
		
		for (int i =0 ; i<colTags.size(); i++ ){
			TagBean t = colTags.get(i);
		
			try {

				connection = DriverManagerConnectionPool.getConnection();
				prepareteStatement =connection.prepareStatement(sqlForTag);
				prepareteStatement.setString(1, t.getNome());
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
	
	
	public void retriveAnnuncio(String titolo) throws SQLException {}
	public void deleteAnnuncio(String titolo) throws SQLException {}
	public void updateAnnuncio(String titolo) throws SQLException {}
	
	
	public void retriveAnnuncio(TagBean tag) throws SQLException {}
	public void deleteFile(TagBean tag) throws SQLException {}
	public void updateAnnuncio(TagBean tag) throws SQLException {}
	
	
	
	
	
	
}
