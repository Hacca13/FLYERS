package dm;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import beans.TagBean;
import beans.UtenteBean;
import jdbc.DriverManagerConnectionPool;

public class TagDM {

	private final static String TABLE_NAME="TAG";


	public synchronized void insertUser(TagBean newTag) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;

		String insertSQL = "INSERT INTO "+TABLE_NAME+" (NOME)"+" VALUE (?)";

		try {
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(insertSQL);
			preparedStatement.setString(1, newTag.getNome());
			preparedStatement.executeUpdate();

			connection.commit();

		} finally {
			try {
				if (preparedStatement != null)
					preparedStatement.close();
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}
		}

	}

	public synchronized void updateTag(TagBean tag) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;

		String updateSQL = "UPDATE "+TABLE_NAME+" SET NOME = ? WHERE KEYTAG = ? ";

		try {
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(updateSQL);
			preparedStatement.setString(1, tag.getNome());
			preparedStatement.setInt(2, tag.getKeyTag());
			preparedStatement.executeUpdate();

			connection.commit();

		} finally {
			try {
				if (preparedStatement != null)
					preparedStatement.close();
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}

		}

	}

	public synchronized void deleteTag(int keyTag) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;

		String deleteSQL = "DELETE FROM "+TABLE_NAME+" WHERE KEYTAG = ?";

		try {
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(deleteSQL);
			preparedStatement.setInt(1, keyTag);
			preparedStatement.executeUpdate();

			connection.commit();

		} finally {
			try {
				if (preparedStatement != null)
					preparedStatement.close();
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}

		}

	}

	public synchronized TagBean searchTag(int key) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		TagBean tag=new TagBean();
		ResultSet rs;

		String searchSQL = "SELECT * FROM "+TABLE_NAME+" WHERE KEYTAG = ?";

		try {
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(searchSQL);
			preparedStatement.setInt(1, key);
			rs = preparedStatement.executeQuery();

			while(rs.next()){
				tag.setKeyTag(rs.getInt("KEYTAG"));
				tag.setNome(rs.getString("NOME"));
			}

		} finally {
			try {
				if (preparedStatement != null)
					preparedStatement.close();
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}

		}

		return tag;
	}

	public synchronized TagBean searchTag(String nome) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		TagBean tag=new TagBean();
		ResultSet rs;

		String searchSQL = "SELECT * FROM "+TABLE_NAME+" WHERE NOME = ?";

		try {
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(searchSQL);
			preparedStatement.setString(1, nome);
			rs = preparedStatement.executeQuery();

			while(rs.next()){
				tag.setKeyTag(rs.getInt("KEYTAG"));
				tag.setNome(rs.getString("NOME"));
			}

		} finally {
			try {
				if (preparedStatement != null)
					preparedStatement.close();
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}

		}

		return tag;
	}

	public synchronized boolean existsTag(int key) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		ResultSet rs;
		TagBean tag = new TagBean();

		String querySQL="SELECT * FROM "+TABLE_NAME+" WHERE KEYTAG = ?";

		try{
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(querySQL);
			preparedStatement.setInt(1, key);
			rs = preparedStatement.executeQuery();

			while(rs.next()){
				tag.setKeyTag(rs.getInt(1));
				tag.setNome(rs.getString(2));
			}

		}finally {
			try {
				if (preparedStatement != null)
					preparedStatement.close();
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}

		}

		if(tag.getKeyTag()==0){
			return false;
		}
		else{
			return true;
		}


	}

	public synchronized boolean existsTag(String name) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		ResultSet rs;
		TagBean tag = new TagBean();
		String querySQL="SELECT * FROM "+TABLE_NAME+" WHERE NOME = ?";

		try{
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(querySQL);
			preparedStatement.setString(1, name);
			rs = preparedStatement.executeQuery();

			while(rs.next()){
				tag.setKeyTag(rs.getInt(1));
				tag.setNome(rs.getString(2));
			}

		}finally {
			try {
				if (preparedStatement != null)
					preparedStatement.close();
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}

		}

		if(tag.getKeyTag()==0){
			return false;
		}
		else{
			return true;
		}

	}

}