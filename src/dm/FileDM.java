package dm;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.LinkedList;
import java.util.List;

import beans.FileBean;
import beans.TagBean;
import jdbc.DriverManagerConnectionPool;

public class FileDM {

	private final static String TABLE_FILE ="OBJECTFILE (NOME,DESCRIZIONE,RAITING,DATADICARICAMENTO)";
	private final static String TABLE_JOIN_TAG_BEAN = "TAGPERFILE (KEYTAG, KEYFILE)";

	public FileDM(){}

	public synchronized void insertObjectFile(FileBean bean, List<TagBean> colTags) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		TagDM tagDM = new TagDM();

		String sqlForFile = "INSERT INTO "+TABLE_FILE+" VALUES(?,?,?,?,?)";


		try {
			connection = DriverManagerConnectionPool.getConnection();

			preparedStatement = connection.prepareStatement(sqlForFile);
			preparedStatement.setString(1,bean.getNome());
			preparedStatement.setString(2,bean.getDescrizione());
			preparedStatement.setDouble(3,bean.getRaiting());
			preparedStatement.setDate(4, bean.getDataDiCaricamento());
			preparedStatement.setInt(5,bean.getKeyUtente());
			preparedStatement.executeUpdate();

			connection.commit();

		}finally{
			if(connection != null){
				try {
					connection.close();
				} finally {
					DriverManagerConnectionPool.releaseConnection(connection);
				}
			}
		}

		/*inserimento dei tag*/
		for(int i=0; i<colTags.size();i++){
			TagBean t = colTags.get(i);

			if(tagDM.existsTag(t.getNome())){
				/*il tag esiste -> si aggiorna solo la tabella del join, 
				 * 
				 * il tag esiste quindi si procede al prelevarlo dal db */


				updateJoinTable(0,0);
			}else{
				/*inserisco il tag*/

				tagDM.insertTag(t);
				/*creo il riferimento nella tabella di join*/

				/*aggiungere la query dell'ultima colonna*/

				updateJoinTable(0,0);
			}


		}


	}

	public synchronized List<FileBean> searchFile(String nome, String orderBy)throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		ResultSet rs = null;
		List<FileBean> listofbeans = new LinkedList<FileBean>();
		String sql = "SELECT * FROM "+TABLE_FILE+" WHERE NOME LIKE ?";

		if(orderBy == null || !(orderBy.equals(""))){
			sql = sql+" ORDER BY "+orderBy;
		}
		
		try{
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(sql);
			preparedStatement.setString(1, nome);
			rs = preparedStatement.executeQuery();

			while(rs.next()){
				FileBean fileBean = new FileBean();
				fileBean.setKeyFile(rs.getInt("KEYTAG"));
				fileBean.setNome(rs.getString("NOME"));
				fileBean.setDescrizione(rs.getString("DESCRIZIONE"));
				fileBean.setDataDiCaricamento(rs.getDate("DATADICARICAMENTO"));
				fileBean.setRaiting(rs.getDouble("RAITING"));
				fileBean.setKeyUtente(rs.getInt("KEYUTENTE"));

				listofbeans.add(fileBean);	
			}
		}finally{
			if(connection!= null){
				try {
					connection.close();
				}finally{
					DriverManagerConnectionPool.releaseConnection(connection);
				}
			}
		}	

		return listofbeans;
	}

	public synchronized List<FileBean> searchFile(TagBean tag, String orderBy)throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		ResultSet rs = null;

		TagDM tagDM = new TagDM();
		TagBean tagBean = tagDM.searchTag(tag.getNome());


		String sqlKeys = "SELECT * FROM "+TABLE_JOIN_TAG_BEAN+" WHERE KEYTAG = ?";
		
		if(orderBy == null || !(orderBy.equals(""))){
			sqlKeys = sqlKeys+" ORDER BY "+orderBy;
		}

		ArrayList<Integer> keysofFiles = new ArrayList<Integer>();

		try{
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(sqlKeys);
			preparedStatement.setInt(1, tagBean.getKeyTag());
			rs = preparedStatement.executeQuery();

			while(rs.next()){

				int result = rs.getInt("KEYFILE");
				keysofFiles.add(result);

			}
		}finally{
			if(connection!= null){
				try {
					connection.close();
				}finally{
					DriverManagerConnectionPool.releaseConnection(connection);
				}
			}

		}

		List<FileBean> listofbeans = new LinkedList<FileBean>();

		for(int i=0; i<keysofFiles.size(); i++){

			FileBean filebean = getFile(keysofFiles.get(i));

			listofbeans.add(filebean);

		}

		return listofbeans;
	}

	public synchronized boolean deleteFile(String nomeFile, int keyUtente)throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		int rows = 0;

		String sql = "DELETE FROM "+TABLE_FILE+" WHERE NOME = ? AND KEYUTENTE = ?";

		try{
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(sql);
			preparedStatement.setString(1, nomeFile);
			preparedStatement.setInt(2, keyUtente);
			rows = preparedStatement.executeUpdate();
		}finally{
			if(connection!= null){
				try {
					connection.close();
				}finally{
					DriverManagerConnectionPool.releaseConnection(connection);
				}
			}

		}

		return (rows!=0);
	}

	public synchronized boolean updateDescriptionFile(String description, String nomeFile, int keyUtente)throws SQLException{

	Connection connection = null;
	PreparedStatement preparedStatement = null;

	String sql = "UPDATE "+TABLE_FILE+" SET DESCRIZIONE = ?  WHERE NOME = ? AND KEYUTENTE = ?";
	int rows = 0;
	
	try{
		connection = DriverManagerConnectionPool.getConnection();
		preparedStatement = connection.prepareStatement(sql);
		preparedStatement.setString(1, description);
		preparedStatement.setString(2, nomeFile);
		preparedStatement.setInt(3, keyUtente);
		rows = preparedStatement.executeUpdate();
	}finally{
		if(connection!= null){
			try {
				connection.close();
			}finally{
				DriverManagerConnectionPool.releaseConnection(connection);
			}
		}
	}
	

		return (rows!=0);
	}

	private synchronized FileBean getFile(int key) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		ResultSet rs;
		String sql = "SELECT * FROM "+TABLE_FILE+" WHERE KEY = ?";
		FileBean fileBean = new FileBean();


		try{
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(sql);
			preparedStatement.setInt(1, key);
			rs = preparedStatement.executeQuery();

			if(rs.next()){
				fileBean.setKeyFile(rs.getInt("KEYTAG"));
				fileBean.setNome(rs.getString("NOME"));
				fileBean.setDescrizione(rs.getString("DESCRIZIONE"));
				fileBean.setDataDiCaricamento(rs.getDate("DATADICARICAMENTO"));
				fileBean.setRaiting(rs.getDouble("RAITING"));
				fileBean.setKeyUtente(rs.getInt("KEYUTENTE"));
			}


		}finally{
			if(connection!= null){
				try {
					connection.close();
				}finally{
					DriverManagerConnectionPool.releaseConnection(connection);
				}
			}
		}


		return fileBean;	
	}

	private synchronized boolean updateJoinTable(int keyTag, int keyFile) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		int rows = 0;
		String sqlJoin = "INSERT INTO "+TABLE_JOIN_TAG_BEAN+" VALUES(?,?)";

		try{
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(sqlJoin);
			preparedStatement.setInt(1, keyTag);
			preparedStatement.setInt(2, keyFile);
			rows = preparedStatement.executeUpdate();
			connection.commit();
		}finally{
			if(connection != null){
				try {
					connection.close();
				} finally {
					DriverManagerConnectionPool.releaseConnection(connection);
				}
			}
		}

		return (rows != 0);

	}

}
